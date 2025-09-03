<?php

namespace App\Mail;

use App\Models\Pengaduan;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PengaduanDiterimaMail extends Mailable
{
    use Queueable, SerializesModels;

    public $pengaduan;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Pengaduan $pengaduan)
    {
        $this->pengaduan = $pengaduan;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Pengaduan Anda Telah Diterima - ' . config('app.name'))
                   ->markdown('emails.pengaduan.diterima')
                   ->with([
                       'pengaduan' => $this->pengaduan,
                       'nomor_pengaduan' => str_pad($this->pengaduan->id, 5, '0', STR_PAD_LEFT),
                       'tanggal' => $this->pengaduan->created_at->format('d-m-Y H:i'),
                   ]);
    }
}