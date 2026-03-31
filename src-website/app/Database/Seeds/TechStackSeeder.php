<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TechStackSeeder extends Seeder
{
    public function run(): void
    {
        // ── Platforms ────────────────────────────────────────────────────────
        $platforms = [
            ['id' => 1, 'name' => 'Web App',   'icon' => 'bi-globe'],
            ['id' => 2, 'name' => 'Mobile App', 'icon' => 'bi-phone'],
            ['id' => 3, 'name' => 'Desktop App','icon' => 'bi-display'],
            ['id' => 4, 'name' => 'Embedded / IoT', 'icon' => 'bi-cpu'],
        ];
        $this->db->table('platforms')->insertBatch($platforms);

        // ── Languages ────────────────────────────────────────────────────────
        $languages = [
            // Web App
            ['id' =>  1, 'platform_id' => 1, 'name' => 'JavaScript / TypeScript'],
            ['id' =>  2, 'platform_id' => 1, 'name' => 'PHP'],
            ['id' =>  3, 'platform_id' => 1, 'name' => 'Python'],
            ['id' =>  4, 'platform_id' => 1, 'name' => 'Go'],
            // Mobile App
            ['id' =>  5, 'platform_id' => 2, 'name' => 'Dart'],
            ['id' =>  6, 'platform_id' => 2, 'name' => 'Swift'],
            ['id' =>  7, 'platform_id' => 2, 'name' => 'Kotlin'],
            ['id' =>  8, 'platform_id' => 2, 'name' => 'JavaScript / TypeScript'],
            // Desktop App
            ['id' =>  9, 'platform_id' => 3, 'name' => 'JavaScript / TypeScript'],
            ['id' => 10, 'platform_id' => 3, 'name' => 'C#'],
            ['id' => 11, 'platform_id' => 3, 'name' => 'Python'],
            ['id' => 12, 'platform_id' => 3, 'name' => 'Rust'],
            // Embedded / IoT
            ['id' => 13, 'platform_id' => 4, 'name' => 'C / C++'],
            ['id' => 14, 'platform_id' => 4, 'name' => 'MicroPython'],
            ['id' => 15, 'platform_id' => 4, 'name' => 'Rust'],
        ];
        $this->db->table('stack_languages')->insertBatch($languages);

        // ── Frameworks ───────────────────────────────────────────────────────
        $frameworks = [
            // JS/TS → Web
            ['language_id' =>  1, 'name' => 'React',    'setup_command' => 'npm create vite@latest my-app -- --template react-ts',   'description' => 'Component-based UI library by Meta', 'libraries' => 'TanStack Query, Zustand, React Router, shadcn/ui'],
            ['language_id' =>  1, 'name' => 'Vue 3',    'setup_command' => 'npm create vue@latest my-app',                           'description' => 'Progressive framework with Composition API', 'libraries' => 'Pinia, Vue Router, VueUse, Nuxt 3'],
            ['language_id' =>  1, 'name' => 'Next.js',  'setup_command' => 'npx create-next-app@latest my-app',                     'description' => 'React framework with SSR & App Router', 'libraries' => 'Prisma, NextAuth, tRPC, ShadCN'],
            ['language_id' =>  1, 'name' => 'Svelte',   'setup_command' => 'npm create svelte@latest my-app',                       'description' => 'Compiler-first framework, zero virtual DOM', 'libraries' => 'SvelteKit, Svelte Stores, Skeleton UI'],
            ['language_id' =>  1, 'name' => 'Astro',    'setup_command' => 'npm create astro@latest my-app',                        'description' => 'Island architecture for content-heavy sites', 'libraries' => 'Astro DB, Starlight, Tailwind'],
            // PHP → Web
            ['language_id' =>  2, 'name' => 'Laravel',      'setup_command' => 'composer create-project laravel/laravel my-app',            'description' => 'Full-stack PHP framework with Eloquent ORM', 'libraries' => 'Livewire, Inertia.js, Filament, Sanctum'],
            ['language_id' =>  2, 'name' => 'CodeIgniter 4', 'setup_command' => 'composer create-project codeigniter4/appstarter my-app',    'description' => 'Lightweight MVC framework — this very demo!', 'libraries' => 'HTMX, Shield, Myth-Auth, Grocery CRUD'],
            ['language_id' =>  2, 'name' => 'Symfony',      'setup_command' => 'composer create-project symfony/skeleton my-app',            'description' => 'Enterprise PHP framework with components', 'libraries' => 'Doctrine, API Platform, EasyAdmin, Twig'],
            ['language_id' =>  2, 'name' => 'Slim',         'setup_command' => 'composer create-project slim/slim-skeleton my-app',          'description' => 'Micro-framework ideal for APIs & microservices', 'libraries' => 'PHP-DI, Monolog, Nyholm PSR7'],
            // Python → Web
            ['language_id' =>  3, 'name' => 'Django',   'setup_command' => 'pip install django && django-admin startproject my_app',  'description' => 'Batteries-included Python web framework', 'libraries' => 'DRF, Celery, django-htmx, Channels'],
            ['language_id' =>  3, 'name' => 'FastAPI',  'setup_command' => 'pip install fastapi uvicorn && uvicorn main:app',         'description' => 'Modern async API framework with auto docs', 'libraries' => 'SQLAlchemy, Pydantic, Alembic, httpx'],
            ['language_id' =>  3, 'name' => 'Flask',    'setup_command' => 'pip install flask && flask run',                          'description' => 'Minimalist WSGI micro-framework', 'libraries' => 'SQLAlchemy, Flask-Login, Marshmallow, Celery'],
            // Go → Web
            ['language_id' =>  4, 'name' => 'Gin',     'setup_command' => 'go mod init my-app && go get github.com/gin-gonic/gin',   'description' => 'High-performance HTTP web framework for Go', 'libraries' => 'GORM, Viper, Zap, go-validator'],
            ['language_id' =>  4, 'name' => 'Echo',    'setup_command' => 'go mod init my-app && go get github.com/labstack/echo/v4', 'description' => 'Minimalist & extensible Go web framework', 'libraries' => 'GORM, Validator, JWT, Echo Swagger'],
            ['language_id' =>  4, 'name' => 'Fiber',   'setup_command' => 'go mod init my-app && go get github.com/gofiber/fiber/v2', 'description' => 'Express-inspired framework built on Fasthttp', 'libraries' => 'Ent, Fiber JWT, Fiber Swagger'],
            // Dart → Mobile
            ['language_id' =>  5, 'name' => 'Flutter', 'setup_command' => 'flutter create my_app && cd my_app && flutter run',       'description' => 'Cross-platform UI toolkit by Google (iOS, Android, Web, Desktop)', 'libraries' => 'Riverpod, Bloc, Dio, Isar, go_router'],
            // Swift → Mobile
            ['language_id' =>  6, 'name' => 'SwiftUI', 'setup_command' => 'Open Xcode → File → New → App → SwiftUI',                'description' => 'Declarative UI framework for Apple platforms', 'libraries' => 'Combine, SwiftData, Alamofire, Kingfisher'],
            ['language_id' =>  6, 'name' => 'UIKit',   'setup_command' => 'Open Xcode → File → New → App → Storyboard',             'description' => 'Imperative UI framework — the classic iOS way', 'libraries' => 'Alamofire, SDWebImage, SnapKit, RxSwift'],
            // Kotlin → Mobile
            ['language_id' =>  7, 'name' => 'Jetpack Compose', 'setup_command' => 'Android Studio → New Project → Empty Activity',  'description' => 'Modern declarative UI toolkit for Android', 'libraries' => 'Hilt, Room, Retrofit, Coil, Navigation'],
            ['language_id' =>  7, 'name' => 'XML + Views',     'setup_command' => 'Android Studio → New Project → Empty Views Activity', 'description' => 'Traditional Android UI with XML layouts', 'libraries' => 'Hilt, Room, Retrofit, Glide, LiveData'],
            // JS/TS → Mobile
            ['language_id' =>  8, 'name' => 'React Native', 'setup_command' => 'npx create-expo-app my-app',                        'description' => 'Build native apps using React — iOS & Android', 'libraries' => 'Expo Router, Zustand, TanStack Query, NativeWind'],
            // JS/TS → Desktop
            ['language_id' =>  9, 'name' => 'Electron', 'setup_command' => 'npm init electron-app@latest my-app',                   'description' => 'Cross-platform desktop using Chromium + Node.js', 'libraries' => 'React/Vue + Electron, IPC, electron-store'],
            ['language_id' =>  9, 'name' => 'Tauri',    'setup_command' => 'npm create tauri-app@latest my-app',                    'description' => 'Lightweight desktop with Rust backend + web frontend', 'libraries' => 'Vite + React/Vue/Svelte, Tauri plugins'],
            // C# → Desktop
            ['language_id' => 10, 'name' => '.NET MAUI', 'setup_command' => 'dotnet new maui -n my-app',                            'description' => 'Cross-platform .NET UI — Windows, macOS, iOS, Android', 'libraries' => 'CommunityToolkit, SQLite-net, Prism, MVVM'],
            ['language_id' => 10, 'name' => 'WPF',      'setup_command' => 'dotnet new wpf -n my-app',                              'description' => 'Windows Presentation Foundation — Windows only', 'libraries' => 'MVVM Toolkit, Prism, MahApps.Metro, LiveCharts'],
            // Python → Desktop
            ['language_id' => 11, 'name' => 'PyQt6',  'setup_command' => 'pip install PyQt6 && python main.py',                    'description' => 'Qt bindings for Python — cross-platform GUI', 'libraries' => 'Qt Designer, QThread, SQLAlchemy'],
            ['language_id' => 11, 'name' => 'Tkinter', 'setup_command' => 'python -m tkinter  # built-in, no install needed',      'description' => 'Standard Python GUI library — ships with Python', 'libraries' => 'CustomTkinter, ttkbootstrap, Pillow'],
            // Rust → Desktop
            ['language_id' => 12, 'name' => 'Tauri',  'setup_command' => 'npm create tauri-app@latest my-app',                     'description' => 'Native desktop with Rust backend — smallest bundle', 'libraries' => 'Serde, Tokio, Tauri plugins, SQLx'],
            ['language_id' => 12, 'name' => 'Slint',  'setup_command' => 'cargo new my-app && cargo add slint',                    'description' => 'Declarative UI toolkit written in Rust', 'libraries' => 'Tokio, Serde, slint-build'],
            // C/C++ → Embedded
            ['language_id' => 13, 'name' => 'Arduino',  'setup_command' => 'Install Arduino IDE → New Sketch',                     'description' => 'Beginner-friendly framework for AVR / ARM boards', 'libraries' => 'Wire, SPI, Servo, Adafruit libs'],
            ['language_id' => 13, 'name' => 'ESP-IDF',  'setup_command' => 'idf.py create-project my-app && idf.py build flash',   'description' => 'Official Espressif IoT Development Framework', 'libraries' => 'FreeRTOS, MQTT, WiFi, BLE stack'],
            ['language_id' => 13, 'name' => 'Zephyr',   'setup_command' => 'west init my-workspace && west build',                  'description' => 'RTOS for resource-constrained devices (Linux Foundation)', 'libraries' => 'BLE, Sensor API, Flash storage, networking'],
            // MicroPython → Embedded
            ['language_id' => 14, 'name' => 'MicroPython', 'setup_command' => 'pip install mpremote && mpremote connect auto run main.py', 'description' => 'Python for microcontrollers — runs on ESP32, Pi Pico', 'libraries' => 'uasyncio, urequests, ujson, machine'],
            // Rust → Embedded
            ['language_id' => 15, 'name' => 'Embassy',     'setup_command' => 'cargo generate --git https://github.com/embassy-rs/embassy-template', 'description' => 'Async embedded framework in Rust', 'libraries' => 'embassy-time, embassy-net, defmt, RTIC'],
            ['language_id' => 15, 'name' => 'RTIC',        'setup_command' => 'cargo new my-app && cargo add cortex-m-rtic',        'description' => 'Real-Time Interrupt-driven Concurrency for Cortex-M', 'libraries' => 'defmt, panic-probe, heapless'],
        ];
        $this->db->table('stack_frameworks')->insertBatch($frameworks);
    }
}
