<?php

namespace App\Exports;

use App\Models\Referral;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class ReferralExport implements FromCollection, WithMapping, WithHeadings, WithColumnFormatting
{

    private $id;
    use Exportable;

    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Referral::getReferralsForDownload($this->id);
    }

    public function headings():array
    {
        return ['Referee Name', 'Refer Name', 'Referee Mobile Number', 'Refer Mobile Number', 'Business Name', 'Business Mobile', 'Feedback', 'Date created'];
    }

    public function map($refers):array
    {
        return [ $refers->yfname.' '.$refers->ylname, $refers->ffname.' '.$refers->flname, $refers->ymobile, $refers->fmobile, $refers->bname, $refers->bmobile, $refers->feedback, Date::stringToExcel($refers->created_at)];
    }

    public function columnFormats(): array
    {
        return [ 'H' => NumberFormat::FORMAT_DATE_DDMMYYYY ];
    }
}
