<?php

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\BumdesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DatapendudukController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\GambaranUmumController;
use App\Http\Controllers\PekerjaanPendidikanController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SambutanLurahController;
use App\Http\Controllers\VisiMisiController;
use App\Http\Controllers\SejarahController;
use App\Http\Controllers\StatistikController;
use App\Http\Controllers\StrukturOrganisasiController;
use App\Http\Controllers\infoKelurahanController;
use App\Http\Controllers\JenisPelayananController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\PelayananController;
use App\Http\Controllers\PetaController;
use Illuminate\Support\Facades\Route;

// Route::get('/storage-link', function () {
//     $targetFolder = base_path() . '/storage/app/public';
//     $linkFolder = $_SERVER['DOCUMENT_ROOT'] . '/storage';
//     symlink($targetFolder, $linkFolder);
// });

// Beranda Routes
Route::get('/', [BerandaController::class, 'index'])->name('home');

Route::prefix('/pengguna')->middleware('auth:masyarakat')->group(function () {
    Route::get('/logout', [MasyarakatController::class, 'logout'])->name('mas_logout');
    Route::get('/profil', [MasyarakatController::class, 'profil'])->name('mas_profil');
});

Route::prefix('/pengguna')->middleware('guest:masyarakat,web')->group(function () {
    Route::get('/login', [MasyarakatController::class, 'login'])->name('login');
    Route::post('/login', [MasyarakatController::class, 'proseslogin'])->name('proseslogin');
});

// KADES
Route::prefix('administrator/dashboard')->middleware(['auth:web', 'is_lurah'])->group(function () {
    // sambutan kades
    Route::get('/sambutan-kades', [SambutanLurahController::class, 'edit'])->name('lurah.index');
    Route::post('/sambutan-kades', [SambutanLurahController::class, 'store'])->name('lurah.store');
    Route::put('/sambutan-kades/{sambutan}/update', [SambutanLurahController::class, 'update'])->name('lurah.update');

    Route::get('/manajemen-pengguna', []);
});

// ADMIN
Route::prefix('administrator/dashboard')->middleware(['auth:web', 'is_admin'])->group(function () {
    Route::get('/data-penduduk/tambah', [DatapendudukController::class, 'create'])->name('datapenduduk.tambah');

    // visimisi
    Route::get('/profil-kelurahan/visi-misi', [VisiMisiController::class, 'edit'])->name('visimisi.index');
    Route::put('/profil-kelurahan/visi-misi/{visiMisi}/update', [VisiMisiController::class, 'update'])->name('visimisi.update');
    Route::post('/profil-kelurahan/visi-misi/', [VisiMisiController::class, 'store'])->name('visimisi.store');

    // sejarah
    Route::get('/profil-kelurahan/sejarah', [SejarahController::class, 'edit'])->name('sejarah.index');
    Route::put('/profil-kelurahan/sejarah/{sejarah}/update', [SejarahController::class, 'update'])->name('sejarah.update');
    Route::post('/profil-kelurahan/sejarah/', [SejarahController::class, 'store'])->name('sejarah.store');

    // gambaran umum
    Route::get('/profil-kelurahan/gambaranumum', [GambaranUmumController::class, 'edit'])->name('gambaranumum.index');
    Route::put('/profil-kelurahan/gambaranumum/{gambaranumum}/update', [GambaranUmumController::class, 'update'])->name('gambaranumum.update');
    Route::post('/profil-kelurahan/gambaranumum/', [GambaranUmumController::class, 'store'])->name('gambaranumum.store');

    //struktur organisani
    Route::get('/profil-kelurahan/struktur-organisasi', [StrukturOrganisasiController::class, 'index'])->name('organisasi.index');
    Route::post('/profil-kelurahan/tambah-struktur-organisasi/store', [StrukturOrganisasiController::class, 'store'])->name('organisasi.store');
    Route::put('/profil-kelurahan/{struktur_organisasi:id}/edit-struktur-organisasi', [StrukturOrganisasiController::class, 'update'])->name('organisasi.update');

    // pekerjaan & pendidikan
    Route::get('kependudukan/pekerjaan', [PekerjaanPendidikanController::class, 'pekerjaan'])->name('pekerjaan.index');
    Route::get('kependudukan/pendidikan', [PekerjaanPendidikanController::class, 'pendidikan'])->name('pendidikan.index');

    // pekerjaan
    Route::post('/pekerjaan-pekerjaan', [PekerjaanPendidikanController::class, 'strorePekerjaan'])->name('pekerjaan.store');
    Route::delete('/pekerjaan-pekerjaan/{pekerjaan}', [PekerjaanPendidikanController::class, 'destroyPekerjaan'])->name('pekerjaan.delete');

    // pendidikan
    Route::post('/pendidikan-pendidikan', [PekerjaanPendidikanController::class, 'strorePendidikan'])->name('pendidikan.store');
    Route::delete('/pendidikan-pendidikan/{pendidikan}', [PekerjaanPendidikanController::class, 'destroyPendidikan'])->name('pendidikan.delete');

    // data penduduk
    Route::post('/data-penduduk/tambah/store', [DatapendudukController::class, 'store'])->name('datapenduduk.store');
    Route::get('/data-penduduk/{datapenduduk:nik}/edit', [DatapendudukController::class, 'edit'])->name('datapenduduk.edit');
    Route::put('/data-penduduk/{datapenduduk:id}/edit', [DatapendudukController::class, 'update'])->name('datapenduduk.update');
    Route::delete('/data-penduduk/{datapenduduk}', [DatapendudukController::class, 'destroy'])->name('datapenduduk.delete');
});

// DASHBOARD
Route::prefix('administrator/dashboard')->middleware('auth:web')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->middleware(['verified'])->name('dashboard');

    // kependudukan
    Route::get('/data-penduduk', [DatapendudukController::class, 'index'])->name('datapenduduk.index');
    Route::get('/data-penduduk/export', [DatapendudukController::class, 'export'])->name('datapenduduk.export');

    //berita
    Route::get('/berita/semua-berita', [BeritaController::class, 'index'])->name('berita.index');
    Route::get('/berita/tambah-berita', [BeritaController::class, 'create'])->name('berita.tambah');
    Route::post('/berita/tambah-berita/store', [BeritaController::class, 'store'])->name('berita.store');
    Route::get('/berita/{berita:slug}/edit-berita', [BeritaController::class, 'edit'])->name('berita.edit');
    Route::put('/berita/{berita:slug}/edit-berita', [BeritaController::class, 'update'])->name('berita.update');
    Route::delete('/berita/{berita:slug}', [BeritaController::class, 'destroy'])->name('berita.delete');

    // info Kelurahan
    Route::get('/informasi-kelurahan/rt-rw', [infoKelurahanController::class, 'rt_rw'])->name('rt_rw');
    Route::post('/informasi-kelurahan/rt', [infoKelurahanController::class, 'storeRt'])->name('rt.store');
    Route::delete('/informasi-kelurahan/rt/{rt}', [infoKelurahanController::class, 'destroyRt'])->name('rt.delete');
    Route::post('/informasi-kelurahan/rw', [infoKelurahanController::class, 'storeRw'])->name('rw.store');
    Route::delete('/informasi-kelurahan/rw/{rw}', [infoKelurahanController::class, 'destroyRw'])->name('rw.delete');

    // peta
    Route::get('/peta', [PetaController::class, 'index'])->name('peta.index');
    Route::post('/peta', [PetaController::class, 'store'])->name('peta.store');
    Route::delete('/peta/{peta}', [PetaController::class, 'destroy'])->name('peta.delete');

    // bumdes
    Route::get('/bumdes', [BumdesController::class, 'dashboard'])->name('admin.bumdes');
    Route::put('/bumdes/profil', [BumdesController::class, 'updateProfil'])->name('bumdes.update');
    Route::put('/bumdes/struktur', [BumdesController::class, 'updateStruktur'])->name('struktur_bumdes.update');
});
// end dashboard

Route::get('/peta', [PetaController::class, 'front'])->name('peta');
Route::get('/bumdes', [BumdesController::class, 'index'])->name('bumdes');

// PROFIL DESA
Route::prefix('profil')->group(function () {
    Route::get('/visi-misi', [FrontendController::class, 'visimisi'])->name('visimisi');

    Route::get('/gambaran-umum', [FrontendController::class, 'gambaranumum'])->name('gambaran.umum');

    Route::get('/sejarah', [FrontendController::class, 'sejarah'])->name('sejarah');
    Route::get('/struktur-organisasi', [FrontendController::class, 'struktur_organisasi'])->name('struktur.organisasi');
});

// BERITA
Route::prefix('berita')->group(function () {
    Route::get('/', [FrontendController::class, 'berita'])->name('berita');
    Route::get('{berita:slug}/detail', [FrontendController::class, 'detailberita'])->name('detail.berita');
    Route::get('/sambutan-lurah/{sambutanLurah:slug}/detail', [FrontendController::class, 'sambutanlurah'])->name('sambutanlurah');
});

// STATISTIK Routes
Route::prefix('statistik')->group(function () {

    Route::get('/jenis-kelamin', [StatistikController::class, 'jenis_kelamin'])->name('jenis_kelamin');
    Route::get('/agama', [StatistikController::class, 'agama'])->name('agama');
    Route::get('/pekerjaan', [StatistikController::class, 'pekerjaan'])->name('pekerjaan');
    Route::get('/pendidikan', [StatistikController::class, 'pendidikan'])->name('pendidikan');
    Route::get('/kelompok-umur', [StatistikController::class, 'kelompok_umur'])->name('kelompok_umur');
});


// PROFILE
Route::middleware('auth')->group(function () {
    Route::get('/profile-user', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
