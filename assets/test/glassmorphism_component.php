<?php
class GlassmorphismComponent {
    private $apps;
    private $tabs;
    
    public function __construct() {
        // Data bisa diambil dari database atau API
        $this->apps = [
            ['icon' => 'phone', 'label' => 'Phone', 'color' => 'from-green-400 to-green-600'],
            ['icon' => 'message-circle', 'label' => 'Messages', 'color' => 'from-blue-400 to-blue-600'],
            ['icon' => 'mail', 'label' => 'Mail', 'color' => 'from-blue-500 to-indigo-600'],
            ['icon' => 'calendar', 'label' => 'Calendar', 'color' => 'from-red-400 to-red-600'],
            ['icon' => 'camera', 'label' => 'Camera', 'color' => 'from-gray-600 to-gray-800'],
            ['icon' => 'music', 'label' => 'Music', 'color' => 'from-pink-400 to-red-500'],
            ['icon' => 'settings', 'label' => 'Settings', 'color' => 'from-gray-500 to-gray-700'],
            ['icon' => 'bell', 'label' => 'Notifications', 'color' => 'from-orange-400 to-red-500']
        ];
        
        $this->tabs = [
            ['icon' => 'home', 'label' => 'Home'],
            ['icon' => 'search', 'label' => 'Search'],
            ['icon' => 'heart', 'label' => 'Favorites'],
            ['icon' => 'user', 'label' => 'Profile']
        ];
    }
    
    public function render($user_name = "User", $progress = 75) {
        ob_start();
        ?>
        <div class="glassmorphism-container" data-user="<?= htmlspecialchars($user_name) ?>" data-progress="<?= $progress ?>">
            <!-- Include CSS dan JS -->
            <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
            <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
            
            <div class="min-h-screen bg-gradient-to-br from-purple-400 via-pink-500 to-red-500 p-4 flex items-center justify-center">
                <!-- Background elements -->
                <div class="absolute inset-0 overflow-hidden">
                    <div class="absolute top-1/4 left-1/4 w-64 h-64 bg-white/20 rounded-full blur-3xl animate-pulse"></div>
                    <div class="absolute bottom-1/4 right-1/4 w-48 h-48 bg-blue-300/30 rounded-full blur-2xl animate-pulse" style="animation-delay: 1s;"></div>
                    <div class="absolute top-1/2 right-1/3 w-32 h-32 bg-yellow-300/25 rounded-full blur-xl animate-pulse" style="animation-delay: 0.5s;"></div>
                </div>

                <div class="relative w-full max-w-sm mx-auto">
                    <!-- Main Container -->
                    <div class="backdrop-blur-xl bg-white/10 border border-white/20 rounded-3xl p-6 shadow-2xl shadow-black/10">
                        <!-- Header -->
                        <div class="flex items-center justify-between mb-8">
                            <div class="flex items-center space-x-3">
                                <div class="w-3 h-3 bg-red-500 rounded-full shadow-lg shadow-red-500/50"></div>
                                <div class="w-3 h-3 bg-yellow-500 rounded-full shadow-lg shadow-yellow-500/50"></div>
                                <div class="w-3 h-3 bg-green-500 rounded-full shadow-lg shadow-green-500/50"></div>
                            </div>
                            <div class="text-white/80 text-sm font-medium">iOS Control</div>
                        </div>

                        <!-- App Grid -->
                        <div class="grid grid-cols-4 gap-4 mb-8">
                            <?php foreach($this->apps as $index => $app): ?>
                            <button class="relative group app-icon" onclick="handleAppClick('<?= $app['label'] ?>')">
                                <div class="w-14 h-14 bg-gradient-to-br <?= $app['color'] ?> rounded-2xl flex items-center justify-center shadow-lg group-hover:shadow-xl transition-all duration-300 backdrop-blur-sm border border-white/10 relative overflow-hidden">
                                    <i data-lucide="<?= $app['icon'] ?>" class="w-7 h-7 text-white drop-shadow-sm"></i>
                                </div>
                                <div class="text-white/90 text-xs mt-2 font-medium drop-shadow-sm"><?= $app['label'] ?></div>
                            </button>
                            <?php endforeach; ?>
                        </div>

                        <!-- Info Card -->
                        <div class="backdrop-blur-md bg-white/5 border border-white/10 rounded-2xl p-4 mb-6 shadow-lg">
                            <div class="flex items-center space-x-3 mb-3">
                                <div class="w-10 h-10 bg-gradient-to-br from-blue-400 to-purple-600 rounded-full flex items-center justify-center">
                                    <i data-lucide="user" class="w-5 h-5 text-white"></i>
                                </div>
                                <div>
                                    <div class="text-white font-semibold text-sm">Welcome back, <?= htmlspecialchars($user_name) ?>!</div>
                                    <div class="text-white/70 text-xs">Your apps are ready</div>
                                </div>
                            </div>
                            <div class="h-2 bg-white/10 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-blue-400 to-purple-500 rounded-full transition-all duration-1000" style="width: <?= $progress ?>%;"></div>
                            </div>
                        </div>

                        <!-- Bottom Navigation -->
                        <div class="backdrop-blur-lg bg-white/10 border border-white/20 rounded-2xl p-2 shadow-lg relative overflow-hidden">
                            <div class="flex justify-around relative z-10">
                                <?php foreach($this->tabs as $index => $tab): ?>
                                <button class="relative flex flex-col items-center p-3 rounded-xl transition-all duration-300 tab-button <?= $index === 0 ? 'tab-active' : '' ?>" 
                                        onclick="setActiveTab(<?= $index ?>)" data-tab="<?= $index ?>">
                                    <i data-lucide="<?= $tab['icon'] ?>" class="w-6 h-6 mb-1 <?= $index === 0 ? 'text-white' : 'text-white/80' ?>"></i>
                                    <span class="text-xs font-medium <?= $index === 0 ? 'text-white' : 'text-white/60' ?>"><?= $tab['label'] ?></span>
                                </button>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <style>
                .glassmorphism-container .backdrop-blur-xl {
                    backdrop-filter: blur(20px);
                    -webkit-backdrop-filter: blur(20px);
                }
                .glassmorphism-container .backdrop-blur-lg {
                    backdrop-filter: blur(16px);
                    -webkit-backdrop-filter: blur(16px);
                }
                .glassmorphism-container .backdrop-blur-md {
                    backdrop-filter: blur(12px);
                    -webkit-backdrop-filter: blur(12px);
                }
                .glassmorphism-container .app-icon:hover {
                    transform: scale(1.1);
                    transition: transform 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
                }
                .glassmorphism-container .app-icon:active {
                    transform: scale(0.95);
                }
                .glassmorphism-container .tab-active {
                    background: rgba(255, 255, 255, 0.2);
                    backdrop-filter: blur(8px);
                    -webkit-backdrop-filter: blur(8px);
                }
            </style>

            <script>
                // JavaScript functions
                function handleAppClick(appName) {
                    // Kirim data ke PHP via AJAX
                    fetch('handle_app_click.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            app: appName,
                            user: document.querySelector('.glassmorphism-container').dataset.user
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log('App clicked:', data);
                        // Handle response
                    });
                }

                function setActiveTab(index) {
                    // Remove active class from all tabs
                    document.querySelectorAll('.tab-button').forEach((tab, i) => {
                        const icon = tab.querySelector('i');
                        const span = tab.querySelector('span');
                        
                        if (i === index) {
                            tab.classList.add('tab-active');
                            icon.className = icon.className.replace('text-white/80', 'text-white');
                            span.className = span.className.replace('text-white/60', 'text-white');
                        } else {
                            tab.classList.remove('tab-active');
                            icon.className = icon.className.replace('text-white', 'text-white/80');
                            span.className = span.className.replace('text-white', 'text-white/60');
                        }
                    });
                }

                // Initialize icons when DOM is loaded
                document.addEventListener('DOMContentLoaded', function() {
                    lucide.createIcons();
                });
            </script>
        </div>
        <?php
        return ob_get_clean();
    }
}
?>
