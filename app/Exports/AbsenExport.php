<?php

namespace App\Exports;

use App\Absen;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AbsenExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Absen::all();
    }

    /**
    * @var Invoice $invoice
    */
    public function map($absen): array
    {
        return [
            $absen->user->nip,
            $absen->user->nama,
            $absen->user->stream->stream,
            $absen->jam_masuk,
            $absen->tanggal,
            $absen->catatan,
            $absen->picture,
            $absen->status
        ];
    }

    public function headings(): array
    {
        return [
            'NIP',
            'Nama',
            'Stream',
            'Pukul',
            'Tanggal',
            'Keterangan',
            'Surat Keterangan',
            'Status'
        ];
    }
}
