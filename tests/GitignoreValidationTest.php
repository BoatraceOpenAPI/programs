<?php
/**
 * Test Framework: PHPUnit
 * Purpose: Validate critical .gitignore patterns are present and consistent.
 */
use PHPUnit\Framework\TestCase;

final class GitignoreValidationTest extends TestCase
{
    private static $path = __DIR__ . '/../.gitignore';
    private static $expected = [
        // OS-specific
        '.DS_Store',
        'Thumbs.db',
        'ehthumbs.db',
        'Desktop.ini',
        // Temp/log/backup
        '*.log',
        '*.tmp',
        '*.swp',
        '*.swo',
        '*.bak',
        '*.orig',
        // Secrets
        '.env',
        '.env.*',
        '*.key',
        '*.pem',
        // Build/cache
        'dist/',
        'build/',
        'out/',
        'tmp/',
        'cache/',
        '*.pyc',
        '__pycache__/',
        // IDE
        '.vscode/',
        '.history/',
        '.idea/',
        // Node
        'node_modules/',
        'npm-debug.log',
        'yarn-error.log',
        '*.lock',
        // PHP
        'vendor/',
        'composer.phar',
        '.phpunit.result.cache',
        'phpunit.xml.dist',
        '.php-cs-fixer.cache',
        '.phpstan/',
        'psalm.xml.dist',
        'storage/',
        'bootstrap/cache/',
        'var/',
        '*.cache',
        '.env.backup',
        '.env.local',
        '.env.production',
        '.env.testing',
        'homestead.yaml',
        'Homestead.yaml',
        'Homestead.json',
        // WordPress
        'wp-content/uploads/',
        'wp-content/cache/',
        'wp-content/upgrade/',
        'wp-content/debug.log',
        // Coverage
        'coverage/',
        '*.lcov',
        // Other binaries
        '*.iml',
        '*.class',
        '*.o',
        '*.out',
        '*.so',
        '*.dll',
        '*.exe',
        '*.pid',
    ];

    private function readGitignore(): array
    {
        $this->assertFileExists(self::$path, ".gitignore must exist at repo root.");
        $content = file_get_contents(self::$path);
        $this->assertNotFalse($content, "Failed to read .gitignore");
        // Normalize line endings and trim trailing spaces
        $lines = preg_split('/\R/u', $content);
        return array_map(static function ($l) {
            return rtrim($l, " \t");
        }, $lines);
    }

    public function test_expected_patterns_are_present(): void
    {
        $lines = $this->readGitignore();
        $set = array_flip($lines);
        foreach (self::$expected as $pattern) {
            $this->assertArrayHasKey($pattern, $set, "Missing required .gitignore entry: {$pattern}");
        }
    }

    public function test_no_trailing_whitespace_on_rule_lines(): void
    {
        $content = file_get_contents(self::$path);
        $this->assertNotFalse($content);
        $bad = [];
        $i = 0;
        foreach (preg_split('/\R/u', $content) as $line) {
            $i++;
            if ($line !== '' && $line[0] !== '#') {
                if (preg_match('/[ \t]+$/', $line)) {
                    $bad[] = $i;
                }
            }
        }
        $this->assertCount(0, $bad, "Trailing whitespace detected on lines: " . implode(', ', $bad));
    }

    public function test_has_trailing_newline_at_eof(): void
    {
        $content = file_get_contents(self::$path);
        $this->assertNotFalse($content);
        $this->assertTrue(substr($content, -1) === "\n", "Expected .gitignore to end with a newline.");
    }

    public function test_no_duplicate_rules(): void
    {
        $lines = $this->readGitignore();
        $counts = [];
        foreach ($lines as $line) {
            if ($line === '' || str_starts_with($line, '#')) continue;
            $counts[$line] = ($counts[$line] ?? 0) + 1;
        }
        $dupes = array_keys(array_filter($counts, fn($c) => $c > 1));
        $this->assertEmpty($dupes, "Duplicate .gitignore rules found: " . implode(', ', $dupes));
    }

    public function test_section_headers_exist(): void
    {
        $lines = $this->readGitignore();
        $headers = [
            '# OS依存ファイル',
            '# 一時ファイル・ログ・バックアップ',
            '# 環境変数・機密情報',
            '# ビルド成果物・キャッシュ',
            '# IDE / エディタ設定',
            '# Node.js関連',
            '# PHP関連設定',
            '# カバレッジ関連',
            '# その他',
        ];
        $set = array_flip($lines);
        foreach ($headers as $h) {
            $this->assertArrayHasKey($h, $set, "Missing section header: {$h}");
        }
    }
}