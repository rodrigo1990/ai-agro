<?php

namespace Tests\Unit;

use App\Models\Society;
use App\Repositories\Contracts\SocietyRepositoryInterface;
use App\Services\SocietyService;
use PHPUnit\Framework\TestCase;

class SocietyServiceTest extends TestCase
{
    private SocietyRepositoryInterface $repository;
    private SocietyService $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->repository = $this->createMock(SocietyRepositoryInterface::class);
        $this->service = new SocietyService($this->repository);
    }

    public function test_getSocietyByUserId_returns_society_from_repository(): void
    {
        $society = new Society();
        $this->repository
            ->expects($this->once())
            ->method('getByUserId')
            ->with(42)
            ->willReturn($society);

        $result = $this->service->getSocietyByUserId(42);

        $this->assertSame($society, $result);
    }

    public function test_getSocietyByUserId_returns_null_when_not_found(): void
    {
        $this->repository
            ->expects($this->once())
            ->method('getByUserId')
            ->with(99)
            ->willReturn(null);

        $result = $this->service->getSocietyByUserId(99);

        $this->assertNull($result);
    }

    public function test_saveSocietyByUserId_returns_society_from_repository(): void
    {
        $data = ['business_name' => 'Acme Corp', 'tax_id' => '123456789'];
        $society = new Society();

        $this->repository
            ->expects($this->once())
            ->method('saveByUserId')
            ->with(7, $data)
            ->willReturn($society);

        $result = $this->service->saveSocietyByUserId(7, $data);

        $this->assertSame($society, $result);
    }

    public function test_saveSocietyByUserId_passes_all_fields_to_repository(): void
    {
        $data = [
            'business_name' => 'Acme Corp',
            'tax_id' => '123456789',
            'country' => 'AR',
            'logo' => 'logo.png',
        ];
        $society = new Society();

        $this->repository
            ->expects($this->once())
            ->method('saveByUserId')
            ->with(3, $data)
            ->willReturn($society);

        $result = $this->service->saveSocietyByUserId(3, $data);

        $this->assertSame($society, $result);
    }
}
