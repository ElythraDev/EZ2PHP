<?php
require __DIR__ . '/../config.php';
require __DIR__ . '/../router.php';

$method = $_SERVER['REQUEST_METHOD'];
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = str_replace('/index.php', '', $uri);
if ($uri === '') $uri = '/';

ob_start(); 
$router->dispatch($method, $uri); 
$finalContent = ob_get_clean();

$seo = $GLOBALS['SEO_DATA'] ?? [
    'title' => 'Elythra的博客',
    'keywords' => 'elythra, blog',
    'description' => '记录一些生活中的事，和一些情绪碎片，以及一些感想。'
];
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elythra - 个人博客 // 孤</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+SC:wght@300;500;700&display=swap" rel="stylesheet">
    <link href="/assets/css/tailwind.css" rel="stylesheet">
</head>
<body class="bg-[#141216] text-gray-300 min-h-screen flex flex-col">

    <div class="fixed inset-0 z-0 overflow-hidden pointer-events-none diagonal-lines">
        <div class="absolute inset-0 bg-linear-to-tr from-[#1a181d] via-[#2d243a] to-[#a073ba]/20 opacity-70"></div>
        <div class="absolute top-0 left-1/4 w-px h-full bg-white/5"></div>
        <div class="absolute top-0 left-3/4 w-px h-full bg-white/5"></div>
    </div>

    <header class="relative z-10 border-b border-white/5 bg-[#1a181d]/60 backdrop-blur-md">
        <div class="max-w-6xl mx-auto px-6 h-20 flex items-center justify-between">
            <div class="text-2xl font-bold tracking-[0.2em] text-white">
                Elythra<span class="text-[#a073ba]">.</span>
            </div>
            <nav class="flex space-x-8 text-sm tracking-widest text-gray-400 md:flex">
                <a href="/posts" class="hover:text-white transition-colors">文章</a>
                <a href="/archive" class="hover:text-white transition-colors">归档</a>
                <a href="/category" class="hover:text-white transition-colors">分类</a>
                <a href="/works.html" class="hover:text-white transition-colors">作品</a>
                <a href="/about.html" class="hover:text-white transition-colors">关于</a>
            </nav>
        </div>
    </header>

    <div class="relative z-10 max-w-6xl w-full mx-auto px-6 grid grid-cols-1 lg:grid-cols-12 gap-12 pt-16 pb-24 grow">
        
        <main class="lg:col-span-8 space-y-8">
            
            <article class="wet-reflection border border-white/5 rounded-xl p-6 md:p-8 hover:border-[#a073ba]/30 transition-all duration-500 group">
                <header class="mb-4">
                    <div class="flex items-center space-x-3 text-xs tracking-widest text-gray-500 mb-3">
                        <time>2026.03.26</time>
                        <span class="text-white/10">/</span>
                        <span class="text-[#a073ba]/80">情绪碎屑</span>
                    </div>
                    <h2 class="text-2xl font-bold text-white/90 tracking-wider leading-relaxed group-hover:text-[#a073ba] transition-colors">
                        <a href="#" class="block">黄昏站台的最后守望者，除了雾气一无所有。</a>
                    </h2>
                </header>
                <div class="text-gray-400 text-sm leading-loose font-light mb-6 line-clamp-2">
                    在这昏黄与紫调交织的傍晚，我站在站台的边缘。远处的列车已化作一团模糊的灰影，它的灯光像是一个快要燃尽的承诺，仿佛是从另一个时空驶来的回忆。
                </div>
                <footer class="flex justify-between items-center text-sm border-t border-white/5 pt-4">
                    <a href="#" class="text-[#a073ba] font-light tracking-wider hover:underline">阅读全文 →</a>
                    <div class="flex space-x-3 text-xs text-gray-600">
                        <span># 孤</span>
                        <span># 氛围</span>
                    </div>
                </footer>
            </article>
            <article class="wet-reflection border border-white/5 rounded-xl p-6 md:p-8 hover:border-[#a073ba]/30 transition-all duration-500 group">
                <header class="mb-4">
                    <div class="flex items-center space-x-3 text-xs tracking-widest text-gray-500 mb-3">
                        <time>2026.03.20</time>
                        <span class="text-white/10">/</span>
                        <span class="text-[#a073ba]/80">开发与构建</span>
                    </div>
                    <h2 class="text-2xl font-bold text-white/90 tracking-wider leading-relaxed group-hover:text-[#a073ba] transition-colors">
                        <a href="#" class="block">重构前端路由：SPA 架构下的状态管理</a>
                    </h2>
                </header>
                <div class="text-gray-400 text-sm leading-loose font-light mb-6 line-clamp-2">
                    在脱离了传统的后端模板渲染后，我们需要通过 history API 和自定义的路由器来接管页面的跳转逻辑，这不仅是为了无刷新体验，更是为了更好的转场动画控制。
                </div>
                <footer class="flex justify-between items-center text-sm border-t border-white/5 pt-4">
                    <a href="#" class="text-[#a073ba] font-light tracking-wider hover:underline">阅读全文 →</a>
                    <div class="flex space-x-3 text-xs text-gray-600">
                        <span># Dev</span>
                        <span># SPA</span>
                    </div>
                </footer>
            </article>

            <div class="flex justify-between items-center text-sm tracking-widest text-gray-400 px-4 pt-8">
                <a href="#" class="hover:text-white transition-colors">← 新篇</a>
                <span class="text-xs opacity-50 font-mono">PAGE 01 / 04</span>
                <a href="#" class="hover:text-white transition-colors">旧闻 →</a>
            </div>

        </main>

        <aside class="lg:col-span-4 space-y-8">
            
            <div class="wet-reflection border border-white/10 rounded-xl p-8">
                <div class="flex items-center space-x-4 mb-6">
                    <div class="w-16 h-16 rounded-full bg-[#2d243a] border border-[#a073ba]/50 flex items-center justify-center overflow-hidden">
                        <img src="https://q.qlogo.cn/g?b=qq&nk=3773328720&s=640" alt="艾莉希拉" class="w-full h-full object-cover" />
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-white tracking-wider">Elythra</h3>
                        <span class="text-xs text-gray-400 font-mono">Web Developer / Producer</span>
                    </div>
                </div>
                <p class="text-sm text-gray-400 leading-relaxed mb-6">
                    『艾莉希拉』。在这个被霓虹紫和灰雾笼罩的信息流里，记录一些写过的代码、编写的音乐，和听过的风。
                </p>
                <hr class="border-white/5 mb-6">
                <div class="flex justify-around text-xs text-gray-400 tracking-widest font-mono">
                    <div class="text-center"><div class="text-lg text-white font-bold">12</div><div class="mt-1">POSTS</div></div>
                    <div class="text-center"><div class="text-lg text-white font-bold">5</div><div class="mt-1">CATE</div></div>
                    <div class="text-center"><div class="text-lg text-white font-bold">36</div><div class="mt-1">TAGS</div></div>
                </div>
            </div>

            <div class="wet-reflection border border-white/10 rounded-xl p-8">
                <h3 class="text-sm font-bold text-white mb-6 border-b border-white/5 pb-3 tracking-wider uppercase">Categories</h3>
                <ul class="space-y-4 text-sm text-gray-400">
                    <li class="flex justify-between hover:text-white transition-colors cursor-pointer">
                        <span>开发与构建 (Dev)</span>
                        <span class="text-xs text-[#a073ba] font-mono">04</span>
                    </li>
                    <li class="flex justify-between hover:text-white transition-colors cursor-pointer">
                        <span>氛围音乐评 (Atmosphere)</span>
                        <span class="text-xs text-[#a073ba] font-mono">03</span>
                    </li>
                    <li class="flex justify-between hover:text-white transition-colors cursor-pointer">
                        <span>情绪切片 (Fragments)</span>
                        <span class="text-xs text-[#a073ba] font-mono">05</span>
                    </li>
                </ul>
            </div>

        </aside>
    </div>

    <footer class="relative z-10 border-t border-white/5 bg-[#1a181d]/80 py-12">
        <div class="max-w-6xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center text-xs tracking-widest text-gray-500">
            <span class="font-mono">© 2026 ELYTHRA ALL RIGHTS RESERVED. <a href="/sitemap.php">SITEMAP</a> <a href="/feed.php">FEED</a></span>
            <span class="mt-4 md:mt-0 italic">Pray For Tomorrow...</span>
        </div>
    </footer>

</body>
</html>
        <?php // echo $finalContent; ?>
