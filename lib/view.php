<?php
class View {
    public static function render(string $template, array $data = []): string {
        $content = file_get_contents($template);
        $content = preg_replace_callback(
            '#\{foreach\s+(\w+)\s+as\s+(\w+)\}(.*?)\{/foreach\}#s',
            function($matches) use ($data) {
                [$full, $arrName, $itemName, $block] = $matches;
                $arr = $data[$arrName] ?? [];
                $result = '';
                foreach ($arr as $item) {
                    $blockCopy = $block;
                    $blockCopy = preg_replace_callback(
                        '#\{' . $itemName . '\.(\w+)\}#',
                        fn($m) => $item[$m[1]] ?? '',
                        $blockCopy
                    );
                    $result .= $blockCopy;
                }
                return $result;
            },
            $content
        );

    $content = preg_replace_callback(
        '#\{([a-zA-Z0-9_]+)\}#',
        fn($matches) => $data[$matches[1]] ?? '',
        $content
    );


        return $content;
    }
}