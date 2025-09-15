@extends('layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div>
        <ol class="breadcrumb fs-sm mb-1">
            <li class="breadcrumb-item">Data Referensi</li>
            <li class="breadcrumb-item active" aria-current="page">Edit Surat Masuk Perencanaan</li>
        </ol>
        <h4 class="main-title mb-0">Edit Surat Masuk Perencanaan</h4>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="mb-3">
            <a href="{{ route('admin.surat_masuk_perencanaan.index') }}" class="btn btn-link p-0">
                <i class="ri-arrow-left-line"></i> Back to Daftar Surat Masuk Perencanaan
            </a>
        </div>

        <form action="{{ route('admin.surat_masuk_perencanaan.update', $suratMasukPerencanaan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="row mb-3">
                <div class="col-md-2">
                    <label for="nomor" class="form-label">Nomor:</label>
                </div>
                <div class="col-md-8">
                    <div class="d-flex align-items-center">
                        <input type="text" class="form-control @error('nomor') is-invalid @enderror" 
                               id="nomor" name="nomor" value="{{ old('nomor', $suratMasukPerencanaan->nomor) }}" 
                               maxlength="100" required>
                        <span class="text-danger ms-2">*</span>
                    </div>
                    @error('nomor')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-2">
                    <label for="tanggal" class="form-label">Tanggal:</label>
                </div>
                <div class="col-md-8">
                    <div class="d-flex align-items-center">
                        <input type="date" class="form-control @error('tanggal') is-invalid @enderror" 
                               id="tanggal" name="tanggal" value="{{ old('tanggal', $suratMasukPerencanaan->tanggal) }}" required>
                        <span class="text-danger ms-2">*</span>
                    </div>
                    @error('tanggal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-2">
                    <label for="judul" class="form-label">Judul:</label>
                </div>
                <div class="col-md-8">
                    <div class="d-flex align-items-center">
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" 
                               id="judul" name="judul" value="{{ old('judul', $suratMasukPerencanaan->judul) }}" 
                               maxlength="500" required>
                        <span class="text-danger ms-2">*</span>
                    </div>
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-2">
                    <label for="keterangan" class="form-label">Keterangan:</label>
                </div>
                <div class="col-md-8">
                    <div class="d-flex">
                        <textarea class="form-control @error('keterangan') is-invalid @enderror" 
                                  id="keterangan" name="keterangan" rows="3" required>{{ old('keterangan', $suratMasukPerencanaan->keterangan) }}</textarea>
                        <span class="text-danger ms-2">*</span>
                    </div>
                    @error('keterangan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>


            @if($suratMasukPerencanaan->file_name)
            <div class="row mb-3 file-display">
                <div class="col-md-2">
                    <label class="form-label">File:</label>
                </div>
                <div class="col-md-8">
                    <div class="d-flex align-items-center">
                        <span class="me-2">
                            {{ $suratMasukPerencanaan->file_name }} 
                            [{{ number_format($suratMasukPerencanaan->file_size / 1024, 2) }} KB]
                        </span>
                        <button type="button" class="btn btn-link text-danger p-0 btn-delete-file" 
                                data-url="{{ route('admin.surat_masuk_perencanaan.delete_file_by_jenis', ['id' => $suratMasukPerencanaan->id, 'jenis' => 'file']) }}">
                            [DELETE]
                        </button>
                    </div>
                </div>
            </div>
            @endif

            <!-- Upload file section - always present but hidden if file exists -->
            <div class="row mb-3 align-items-center" id="upload-section" style="{{ $suratMasukPerencanaan->file_name ? 'display: none;' : '' }}">
                <div class="col-md-2">
                    <label for="file" class="form-label mb-0">Upload File:</label>
                </div>
                <div class="col-md-8">
                    <input type="file" class="form-control @error('file') is-invalid @enderror" 
                           id="file" name="file" accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx">
                    <div class="form-text">Format yang diperbolehkan: PDF, DOC, DOCX, XLS, XLSX, PPT, PPTX (Maksimal 10MB)</div>
                    @error('file')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Garis pemisah -->
            <hr class="my-4" style="border-top: 2px dashed #dc3545;">

            <div class="row mb-3">
                <div class="col-md-2">
                    <label for="no_arsip" class="form-label">No. Arsip:</label>
                </div>
                <div class="col-md-8">
                    <div class="d-flex align-items-center">
                        <input type="text" class="form-control @error('no_arsip') is-invalid @enderror" 
                               id="no_arsip" name="no_arsip" value="{{ old('no_arsip', $suratMasukPerencanaan->no_arsip) }}" 
                               maxlength="100" required>
                        <span class="text-danger ms-2">*</span>
                    </div>
                    @error('no_arsip')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-2">
                    <label for="tipe_asal_surat" class="form-label">Tipe Asal Surat:</label>
                </div>
                <div class="col-md-8">
                    <div class="d-flex align-items-center">
                        <select class="form-control @error('tipe_asal_surat') is-invalid @enderror" 
                                id="tipe_asal_surat" name="tipe_asal_surat">
                            <option value="">Pilih Tipe Asal Surat</option>
                            <option value="Internal" {{ old('tipe_asal_surat', $suratMasukPerencanaan->tipe_asal_surat) == 'Internal' ? 'selected' : '' }}>Internal</option>
                            <option value="Eksternal" {{ old('tipe_asal_surat', $suratMasukPerencanaan->tipe_asal_surat) == 'Eksternal' ? 'selected' : '' }}>Eksternal</option>
                        </select>
                    </div>
                    @error('tipe_asal_surat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-2">
                    <label for="asal_surat" class="form-label" id="label-asal-surat">Asal Surat:</label>
                </div>
                <div class="col-md-8">
                    <div class="d-flex align-items-center">
                        <select class="form-control @error('asal_surat') is-invalid @enderror" 
                                id="asal_surat" name="asal_surat">
                            <option value="">Pilih Asal Surat</option>
                            <!-- Options akan diisi oleh JavaScript berdasarkan tipe yang dipilih -->
                        </select>
                    </div>
                    @error('asal_surat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-2">
                    <label for="kode_keuangan" class="form-label">Kode Keuangan:</label>
                </div>
                <div class="col-md-8">
                    <div class="d-flex align-items-center">
                        <select class="form-control @error('kode_keuangan') is-invalid @enderror" 
                                id="kode_keuangan" name="kode_keuangan" required>
                            <option value="">Pilih Kode Keuangan</option>
                            <option value="PR.02.01 - Usulan Perencanaan Kegiatan Unit Kerja" {{ old('kode_keuangan', $suratMasukPerencanaan->kode_keuangan) == 'PR.02.01 - Usulan Perencanaan Kegiatan Unit Kerja' ? 'selected' : '' }}>PR.02.01 - Usulan Perencanaan Kegiatan Unit Kerja</option>
                            <option value="PR.01.01 - Rencana Strategis (Renstra)" {{ old('kode_keuangan', $suratMasukPerencanaan->kode_keuangan) == 'PR.01.01 - Rencana Strategis (Renstra)' ? 'selected' : '' }}>PR.01.01 - Rencana Strategis (Renstra)</option>
                            <option value="PR.01.02 - Rencana Pembangunan Jangka Panjang (RPJP)" {{ old('kode_keuangan', $suratMasukPerencanaan->kode_keuangan) == 'PR.01.02 - Rencana Pembangunan Jangka Panjang (RPJP)' ? 'selected' : '' }}>PR.01.02 - Rencana Pembangunan Jangka Panjang (RPJP)</option>
                            <option value="PR.01.03 - Rencana Pembangunan Jangka Menengah (RPJM)" {{ old('kode_keuangan', $suratMasukPerencanaan->kode_keuangan) == 'PR.01.03 - Rencana Pembangunan Jangka Menengah (RPJM)' ? 'selected' : '' }}>PR.01.03 - Rencana Pembangunan Jangka Menengah (RPJM)</option>
                            <option value="PR.01.04 - Pengelolaan Sistem Akuntabilitas Kinerja Instansi Pemerintah (SAKIP)" {{ old('kode_keuangan', $suratMasukPerencanaan->kode_keuangan) == 'PR.01.04 - Pengelolaan Sistem Akuntabilitas Kinerja Instansi Pemerintah (SAKIP)' ? 'selected' : '' }}>PR.01.04 - Pengelolaan Sistem Akuntabilitas Kinerja Instansi Pemerintah (SAKIP)</option>
                            <option value="PR.02.02 - Program Kerja Tahunan Unit Kerja" {{ old('kode_keuangan', $suratMasukPerencanaan->kode_keuangan) == 'PR.02.02 - Program Kerja Tahunan Unit Kerja' ? 'selected' : '' }}>PR.02.02 - Program Kerja Tahunan Unit Kerja</option>
                            <option value="PR.02.03 - Program Kerja Tahunan Setjen DPR RI" {{ old('kode_keuangan', $suratMasukPerencanaan->kode_keuangan) == 'PR.02.03 - Program Kerja Tahunan Setjen DPR RI' ? 'selected' : '' }}>PR.02.03 - Program Kerja Tahunan Setjen DPR RI</option>
                            <option value="PR.03 - Penyusunan RAPBN" {{ old('kode_keuangan', $suratMasukPerencanaan->kode_keuangan) == 'PR.03 - Penyusunan RAPBN' ? 'selected' : '' }}>PR.03 - Penyusunan RAPBN</option>
                            <option value="PR.04.01 - Penetapan Kontrak Kinerja Sekjen DPR RI" {{ old('kode_keuangan', $suratMasukPerencanaan->kode_keuangan) == 'PR.04.01 - Penetapan Kontrak Kinerja Sekjen DPR RI' ? 'selected' : '' }}>PR.04.01 - Penetapan Kontrak Kinerja Sekjen DPR RI</option>
                            <option value="PR.04.02 - Penetapan Kontrak Kinerja Pimpinan Unit Kerja" {{ old('kode_keuangan', $suratMasukPerencanaan->kode_keuangan) == 'PR.04.02 - Penetapan Kontrak Kinerja Pimpinan Unit Kerja' ? 'selected' : '' }}>PR.04.02 - Penetapan Kontrak Kinerja Pimpinan Unit Kerja</option>
                            <option value="PR.05.01 - Laporan Khusus" {{ old('kode_keuangan', $suratMasukPerencanaan->kode_keuangan) == 'PR.05.01 - Laporan Khusus' ? 'selected' : '' }}>PR.05.01 - Laporan Khusus</option>
                            <option value="PR.05.02 - Laporan Berkala" {{ old('kode_keuangan', $suratMasukPerencanaan->kode_keuangan) == 'PR.05.02 - Laporan Berkala' ? 'selected' : '' }}>PR.05.02 - Laporan Berkala</option>
                            <option value="PR.05.03 - Laporan Tahunan DPR RI" {{ old('kode_keuangan', $suratMasukPerencanaan->kode_keuangan) == 'PR.05.03 - Laporan Tahunan DPR RI' ? 'selected' : '' }}>PR.05.03 - Laporan Tahunan DPR RI</option>
                            <option value="PR.05.04 - Laporan Akuntabilitas Kinerja Instansi Pemerintahan (LAKIP)" {{ old('kode_keuangan', $suratMasukPerencanaan->kode_keuangan) == 'PR.05.04 - Laporan Akuntabilitas Kinerja Instansi Pemerintahan (LAKIP)' ? 'selected' : '' }}>PR.05.04 - Laporan Akuntabilitas Kinerja Instansi Pemerintahan (LAKIP)</option>
                            <option value="PR.07.01 - Monitoring dan Evaluasi Unit Kerja" {{ old('kode_keuangan', $suratMasukPerencanaan->kode_keuangan) == 'PR.07.01 - Monitoring dan Evaluasi Unit Kerja' ? 'selected' : '' }}>PR.07.01 - Monitoring dan Evaluasi Unit Kerja</option>
                            <option value="PR.07.02 - Monitoring dan Evaluasi DPR RI" {{ old('kode_keuangan', $suratMasukPerencanaan->kode_keuangan) == 'PR.07.02 - Monitoring dan Evaluasi DPR RI' ? 'selected' : '' }}>PR.07.02 - Monitoring dan Evaluasi DPR RI</option>
                            <option value="PR.08.01 - Lain-lain" {{ old('kode_keuangan', $suratMasukPerencanaan->kode_keuangan) == 'PR.08.01 - Lain-lain' ? 'selected' : '' }}>PR.08.01 - Lain-lain</option>
                        </select>
                        <span class="text-danger ms-2">*</span>
                    </div>
                    @error('kode_keuangan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-2">
                    <label for="klasifikasi" class="form-label">Klasifikasi:</label>
                </div>
                <div class="col-md-8">
                    <div class="d-flex align-items-center">
                        <select class="form-control @error('klasifikasi') is-invalid @enderror" 
                                id="klasifikasi" name="klasifikasi" required>
                            <option value="">Pilih Klasifikasi</option>
                            <option value="Revisi Satker Setjen" {{ old('klasifikasi', $suratMasukPerencanaan->klasifikasi) == 'Revisi Satker Setjen' ? 'selected' : '' }}>Revisi Satker Setjen</option>
                            <option value="Revisi Satker Dewan" {{ old('klasifikasi', $suratMasukPerencanaan->klasifikasi) == 'Revisi Satker Dewan' ? 'selected' : '' }}>Revisi Satker Dewan</option>
                            <option value="Refocusing" {{ old('klasifikasi', $suratMasukPerencanaan->klasifikasi) == 'Refocusing' ? 'selected' : '' }}>Refocusing</option>
                            <option value="RKA Usulan" {{ old('klasifikasi', $suratMasukPerencanaan->klasifikasi) == 'RKA Usulan' ? 'selected' : '' }}>RKA Usulan</option>
                            <option value="Pagu Anggaran" {{ old('klasifikasi', $suratMasukPerencanaan->klasifikasi) == 'Pagu Anggaran' ? 'selected' : '' }}>Pagu Anggaran</option>
                            <option value="Pagu Indikatif" {{ old('klasifikasi', $suratMasukPerencanaan->klasifikasi) == 'Pagu Indikatif' ? 'selected' : '' }}>Pagu Indikatif</option>
                            <option value="Alokasi Anggaran" {{ old('klasifikasi', $suratMasukPerencanaan->klasifikasi) == 'Alokasi Anggaran' ? 'selected' : '' }}>Alokasi Anggaran</option>
                            <option value="DIPA" {{ old('klasifikasi', $suratMasukPerencanaan->klasifikasi) == 'DIPA' ? 'selected' : '' }}>DIPA</option>
                            <option value="Koreksi MA" {{ old('klasifikasi', $suratMasukPerencanaan->klasifikasi) == 'Koreksi MA' ? 'selected' : '' }}>Koreksi MA</option>
                            <option value="IZIN PRINSIP" {{ old('klasifikasi', $suratMasukPerencanaan->klasifikasi) == 'IZIN PRINSIP' ? 'selected' : '' }}>IZIN PRINSIP</option>
                            <option value="MONEV" {{ old('klasifikasi', $suratMasukPerencanaan->klasifikasi) == 'MONEV' ? 'selected' : '' }}>MONEV</option>
                            <option value="Perjanjian Kinerja" {{ old('klasifikasi', $suratMasukPerencanaan->klasifikasi) == 'Perjanjian Kinerja' ? 'selected' : '' }}>Perjanjian Kinerja</option>
                            <option value="SAKIP" {{ old('klasifikasi', $suratMasukPerencanaan->klasifikasi) == 'SAKIP' ? 'selected' : '' }}>SAKIP</option>
                            <option value="TOR" {{ old('klasifikasi', $suratMasukPerencanaan->klasifikasi) == 'TOR' ? 'selected' : '' }}>TOR</option>
                            <option value="RKA K/L" {{ old('klasifikasi', $suratMasukPerencanaan->klasifikasi) == 'RKA K/L' ? 'selected' : '' }}>RKA K/L</option>
                            <option value="Lain-lain" {{ old('klasifikasi', $suratMasukPerencanaan->klasifikasi) == 'Lain-lain' ? 'selected' : '' }}>Lain-lain</option>
                            <option value="ABT" {{ old('klasifikasi', $suratMasukPerencanaan->klasifikasi) == 'ABT' ? 'selected' : '' }}>ABT</option>
                        </select>
                        <span class="text-danger ms-2">*</span>
                    </div>
                    @error('klasifikasi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3 file-display" id="file-display-section" style="{{ $suratMasukPerencanaan->arsip_file_name ? '' : 'display: none;' }}">
                <div class="col-md-2">
                    <label class="form-label">Keterangan:</label>
                </div>
                <div class="col-md-8">
                    <div class="d-flex align-items-center">
                        <span class="me-2">
                            @if($suratMasukPerencanaan->arsip_file_name)
                                {{ $suratMasukPerencanaan->arsip_file_name }} 
                                [{{ number_format($suratMasukPerencanaan->arsip_file_size / 1024, 2) }} KB]
                            @endif
                        </span>
                        <button type="button" class="btn btn-link text-danger p-0 btn-delete-arsip-file" 
                                data-url="{{ route('admin.surat_masuk_perencanaan.delete_file_by_jenis', ['id' => $suratMasukPerencanaan->id, 'jenis' => 'keterangan']) }}">
                            [DELETE]
                        </button>
                    </div>
                </div>
            </div>

            <div class="row mb-3 align-items-center" id="file-upload-section" style="{{ $suratMasukPerencanaan->arsip_file_name ? 'display: none;' : '' }}">
                <div class="col-md-2">
                    <label for="arsip_file" class="form-label mb-0">Upload File Keterangan:</label>
                </div>
                <div class="col-md-8">
                    <input type="file" class="form-control @error('arsip_file') is-invalid @enderror" 
                           id="arsip_file" name="arsip_file" accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx">
                    <div class="form-text">Format yang diperbolehkan: PDF, DOC, DOCX, XLS, XLSX, PPT, PPTX (Maksimal 10MB)</div>
                    @error('arsip_file')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @endif
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('admin.surat_masuk_perencanaan.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
// Data untuk opsi asal surat
const asalSuratOptions = {
    'Internal': [
        { value: 'BADAN KEAHLIAN', text: 'BADAN KEAHLIAN' },
        { value: 'BAGIAN ADMINISTRASI BADAN KEAHLIAN', text: 'BAGIAN ADMINISTRASI BADAN KEAHLIAN' },
        { value: 'BAGIAN ADMINISTRASI BARANG MILIK NEGARA', text: 'BAGIAN ADMINISTRASI BARANG MILIK NEGARA' },
        { value: 'BAGIAN ADMINISTRASI INSPEKTORAT UTAMA', text: 'BAGIAN ADMINISTRASI INSPEKTORAT UTAMA' },
        { value: 'BAGIAN ADMINISTRASI KEUANGAN', text: 'BAGIAN ADMINISTRASI KEUANGAN' },
        { value: 'BAGIAN ARSIP', text: 'BAGIAN ARSIP' },
        { value: 'BAGIAN FASILITASI KEGIATAN LUAR NEGERI ANGGOTA DAN ALIH BAHASA', text: 'BAGIAN FASILITASI KEGIATAN LUAR NEGERI ANGGOTA DAN ALIH BAHASA' },
        { value: 'BAGIAN GEDUNG DAN INSTALASI', text: 'BAGIAN GEDUNG DAN INSTALASI' },
        { value: 'BAGIAN HUBUNGAN MASYARAKAT DAN PENGELOLAAN MUSEUM', text: 'BAGIAN HUBUNGAN MASYARAKAT DAN PENGELOLAAN MUSEUM' },
        { value: 'BAGIAN KEANGGOTAAN DAN KESEKRETARIATAN FRAKSI', text: 'BAGIAN KEANGGOTAAN DAN KESEKRETARIATAN FRAKSI' },
        { value: 'BAGIAN LAYANAN KESEHATAN', text: 'BAGIAN LAYANAN KESEHATAN' },
        { value: 'BAGIAN MANAJEMEN KINERJA DAN INFORMASI ASN', text: 'BAGIAN MANAJEMEN KINERJA DAN INFORMASI ASN' },
        { value: 'BAGIAN MANAJEMEN SDM NON ASN', text: 'BAGIAN MANAJEMEN SDM NON ASN' },
        { value: 'BAGIAN MEDIA CETAK DAN MEDIA SOSIAL', text: 'BAGIAN MEDIA CETAK DAN MEDIA SOSIAL' },
        { value: 'BAGIAN ORGANISASI DAN TATA LAKSANA', text: 'BAGIAN ORGANISASI DAN TATA LAKSANA' },
        { value: 'BAGIAN PEMBENTUKAN PRODUK HUKUM', text: 'BAGIAN PEMBENTUKAN PRODUK HUKUM' },
        { value: 'BAGIAN PEMBINAAN JABATAN FUNGSIONAL', text: 'BAGIAN PEMBINAAN JABATAN FUNGSIONAL' },
        { value: 'BAGIAN PENERBITAN', text: 'BAGIAN PENERBITAN' },
        { value: 'BAGIAN PENGADAAN BARANG/JASA', text: 'BAGIAN PENGADAAN BARANG/JASA' },
        { value: 'Lainnya', text: 'Lainnya' }
    ],
    'Eksternal': [
        { value: 'Kementerian Keuangan', text: 'Kementerian Keuangan' },
        { value: 'Bappenas', text: 'Bappenas' },
        { value: 'Presiden', text: 'Presiden' },
        { value: 'Kementerian Kesehatan', text: 'Kementerian Kesehatan' },
        { value: 'Kementerian Dalam Negeri', text: 'Kementerian Dalam Negeri' },
        { value: 'Kementerian Luar Negeri', text: 'Kementerian Luar Negeri' },
        { value: 'Kementerian Pendidikan dan Kebudayaan', text: 'Kementerian Pendidikan dan Kebudayaan' },
        { value: 'Lainnya', text: 'Lainnya' }
    ]
};

// Fungsi untuk mengupdate opsi asal surat
function updateAsalSuratOptions() {
    const tipeAsalSurat = document.getElementById('tipe_asal_surat').value;
    const asalSuratSelect = document.getElementById('asal_surat');
    const labelAsalSurat = document.getElementById('label-asal-surat');
    
    // Clear existing options
    asalSuratSelect.innerHTML = '<option value="">Pilih Asal Surat</option>';
    
    if (tipeAsalSurat && asalSuratOptions[tipeAsalSurat]) {
        // Update label
        labelAsalSurat.textContent = `Asal Surat (${tipeAsalSurat}):`;
        
        // Add options
        asalSuratOptions[tipeAsalSurat].forEach(option => {
            const optionElement = document.createElement('option');
            optionElement.value = option.value;
            optionElement.textContent = option.text;
            
            // Check if this option was previously selected
            const currentValue = '{{ old("asal_surat", $suratMasukPerencanaan->asal_surat) }}';
            if (option.value === currentValue) {
                optionElement.selected = true;
            }
            
            asalSuratSelect.appendChild(optionElement);
        });
    } else {
        labelAsalSurat.textContent = 'Asal Surat:';
    }
}

// Event listener untuk tipe asal surat
document.getElementById('tipe_asal_surat').addEventListener('change', updateAsalSuratOptions);

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    updateAsalSuratOptions();
    

    // File arsip functionality (now used for keterangan)
    const arsipFileInput = document.getElementById('arsip_file');
    const fileUploadSection = document.getElementById('file-upload-section');
    const fileDisplaySection = document.getElementById('file-display-section');
    
    // Check if elements exist
    if (!arsipFileInput || !fileUploadSection || !fileDisplaySection) {
        console.error('Required elements not found for file upload functionality');
    }

    // File input change handler (no delete button needed)
    if (arsipFileInput) {
        arsipFileInput.addEventListener('change', function(e) {
            // File selected - no additional action needed
        });
    }

});

// File delete functionality
document.addEventListener('click', function(e) {
    if (e.target.classList.contains('btn-delete-file')) {
        e.preventDefault();
        const deleteUrl = e.target.dataset.url;
        
        Swal.fire({
            title: 'Yakin ingin menghapus file?',
            text: 'File yang dihapus tidak dapat dikembalikan!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(deleteUrl, {
                    method: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire('Berhasil!', data.message, 'success')
                            .then(() => {
                                // Hide file display section
                                const fileDisplay = document.querySelector('.file-display');
                                if (fileDisplay) {
                                    fileDisplay.style.display = 'none';
                                }
                                
                                // Show upload section
                                const uploadSection = document.querySelector('#upload-section');
                                if (uploadSection) {
                                    uploadSection.style.display = 'block';
                                }
                            });
                    } else {
                        Swal.fire('Error!', data.message, 'error');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire('Error!', 'Terjadi kesalahan saat menghapus file!', 'error');
                });
            }
        });
    }
    
    
    // File arsip delete functionality
    if (e.target.classList.contains('btn-delete-arsip-file')) {
        e.preventDefault();
        const deleteUrl = e.target.dataset.url;
        
        Swal.fire({
            title: 'Yakin ingin menghapus file arsip?',
            text: 'File yang dihapus tidak dapat dikembalikan!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(deleteUrl, {
                    method: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire('Berhasil!', data.message, 'success')
                            .then(() => {
                                // Hide file display section
                                const fileDisplaySection = document.getElementById('file-display-section');
                                if (fileDisplaySection) {
                                    fileDisplaySection.style.display = 'none';
                                }
                                
                                // Show file upload section
                                const fileUploadSection = document.getElementById('file-upload-section');
                                if (fileUploadSection) {
                                    fileUploadSection.style.display = 'block';
                                }
                                
                                // Reset file input
                                const arsipFileInput = document.getElementById('arsip_file');
                                if (arsipFileInput) {
                                    arsipFileInput.value = '';
                                }
                                
                                
                                // Reset label
                                const label = document.querySelector('label[for="arsip_file"]');
                                if (label) {
                                    label.textContent = 'Upload File Keterangan:';
                                }
                            });
                    } else {
                        Swal.fire('Error!', data.message, 'error');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire('Error!', 'Terjadi kesalahan saat menghapus file', 'error');
                });
            }
        });
    }
});
</script>
@endpush
