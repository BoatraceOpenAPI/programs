<?php

declare(strict_types=1);

namespace BOA\Programs\Tests;

use BOA\Programs\ProgramSaver;
use PHPUnit\Framework\TestCase;

/**
 * @author shimomo
 */
final class ProgramSaverTest extends TestCase
{
    /**
     * @psalm-var non-empty-string
     *
     * @var string
     */
    private string $tempDir;

    /**
     * @psalm-return void
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->tempDir = sys_get_temp_dir() . '/program_saver_test_' . bin2hex(random_bytes(8));
        if (!mkdir($this->tempDir, 0755, true) && !is_dir($this->tempDir)) {
            $this->fail('Failed to create temp dir: ' . $this->tempDir);
        }
    }

    /**
     * @psalm-return void
     *
     * @return void
     */
    protected function tearDown(): void
    {
        if (is_dir($this->tempDir)) {
            $files = new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator($this->tempDir, \FilesystemIterator::SKIP_DOTS),
                \RecursiveIteratorIterator::CHILD_FIRST
            );

            foreach ($files as $file) {
                $file->isDir() ? rmdir($file->getRealPath()) : unlink($file->getRealPath());
            }

            rmdir($this->tempDir);
        }
    }

    /**
     * @psalm-return void
     *
     * @return void
     */
    public function testSave(): void
    {
        $saver = new ProgramSaver();
        $path = $this->tempDir . '/programs.json';

        $programs = [
            [
                'date' => '2025-07-15',
                'stadium_number' => 1,
                'number' => 1,
                'closed_at' => '2025-07-15 15:17:00',
                'day_label' => '初日',
                'grade_label' => '一般',
                'grade_number' => 5,
                'title' => 'にっぽん未来プロジェクト競走in桐生',
                'subtitle' => '予選',
                'distance' => 1800,
                'boats' => [
                    [
                        'racer_boat_number' => 1,
                        'racer_name' => '松本 浩貴',
                        'racer_number' => 3860,
                        'racer_class_number' => 3,
                        'racer_branch_number' => 11,
                        'racer_birthplace_number' => 11,
                        'racer_age' => 52,
                        'racer_weight' => 52,
                        'racer_flying_count' => 0,
                        'racer_late_count' => 0,
                        'racer_average_start_timing' => 0.19,
                        'racer_national_top_1_percent' => 4.09,
                        'racer_national_top_2_percent' => 18.48,
                        'racer_national_top_3_percent' => 39.13,
                        'racer_local_top_1_percent' => 4.85,
                        'racer_local_top_2_percent' => 33.33,
                        'racer_local_top_3_percent' => 40.74,
                        'racer_assigned_motor_number' => 24,
                        'racer_assigned_motor_top_2_percent' => 28,
                        'racer_assigned_motor_top_3_percent' => 42.67,
                        'racer_assigned_boat_number' => 23,
                        'racer_assigned_boat_top_2_percent' => 30.47,
                        'racer_assigned_boat_top_3_percent' => 51.56,
                    ],
                ],
            ],
        ];

        $saver->save($programs, $path);

        $this->assertFileExists($path);

        $content = json_decode(file_get_contents($path), true);
        $this->assertArrayHasKey('programs', $content);
        $this->assertSame($programs, $content['programs']);
    }
}
