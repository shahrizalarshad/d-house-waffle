<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TestTelegramNotification extends Command
{
    protected $signature = 'telegram:test';
    protected $description = 'Test Telegram error notification';

    public function handle(): int
    {
        $token = env('TELEGRAM_BOT_TOKEN');
        $chatId = env('TELEGRAM_CHAT_ID');
        $enabled = env('LOG_TELEGRAM_ERRORS', false);

        $this->info("📱 Telegram Notification Test");
        $this->info("================================");

        // Check configuration
        $this->info("\n🔧 Configuration Check:");
        $this->line("  LOG_TELEGRAM_ERRORS: " . ($enabled ? '✅ true' : '❌ false'));
        $this->line("  TELEGRAM_BOT_TOKEN: " . ($token ? '✅ Set (' . substr($token, 0, 10) . '...)' : '❌ Not set'));
        $this->line("  TELEGRAM_CHAT_ID: " . ($chatId ? '✅ Set (' . $chatId . ')' : '❌ Not set'));

        if (!$token || !$chatId) {
            $this->error("\n❌ Missing configuration! Please set these in .env:");
            $this->line("   TELEGRAM_BOT_TOKEN=your-bot-token");
            $this->line("   TELEGRAM_CHAT_ID=your-chat-id");
            $this->line("   LOG_TELEGRAM_ERRORS=true");
            return Command::FAILURE;
        }

        // Test direct API call
        $this->info("\n📤 Testing direct Telegram API call...");

        $testMessage = "🧪 *Test Message from D'house Waffle*\n\n";
        $testMessage .= "✅ Telegram integration is working!\n";
        $testMessage .= "*Time:* " . now()->format('Y-m-d H:i:s') . "\n";
        $testMessage .= "*Environment:* " . config('app.env');

        try {
            $response = Http::timeout(10)->post("https://api.telegram.org/bot{$token}/sendMessage", [
                'chat_id' => $chatId,
                'text' => $testMessage,
                'parse_mode' => 'Markdown',
            ]);

            if ($response->successful() && $response->json('ok')) {
                $this->info("✅ Direct API call successful!");
                $this->line("   Message ID: " . $response->json('result.message_id'));
            } else {
                $this->error("❌ API call failed!");
                $this->line("   Response: " . $response->body());
                return Command::FAILURE;
            }
        } catch (\Exception $e) {
            $this->error("❌ Exception: " . $e->getMessage());
            return Command::FAILURE;
        }

        // Test via Laravel Log (if enabled)
        if ($enabled) {
            $this->info("\n📝 Testing via Laravel Log::error()...");

            try {
                Log::error('🧪 Test error from telegram:test command', [
                    'url' => '/test/telegram',
                    'user' => 'CLI Test',
                ]);
                $this->info("✅ Log::error() called - check Telegram for message");
            } catch (\Exception $e) {
                $this->warn("⚠️ Log::error() exception: " . $e->getMessage());
            }
        } else {
            $this->warn("\n⚠️ LOG_TELEGRAM_ERRORS=false - Log::error() won't send to Telegram");
            $this->line("   Set LOG_TELEGRAM_ERRORS=true in .env to enable");
        }

        $this->info("\n✅ Test completed! Check your Telegram group.");

        return Command::SUCCESS;
    }
}
