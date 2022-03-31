<?php

namespace App\Http\Responses;

class ConstantString
{
    public static $FOUND_RESPONSE = "Data Berhasil Ditemukan!";
    public static $INSERT_RESPONSE = "Data Berhasil Dimasukan!";
    public static $FAIL_INSERT_RESPONSE = "Data Gagal Dimasukan!";
    public static $DELETE_RESPONSE = "Data Berhasil Dihapus!";
    public static $FAIL_DELETE_RESPONSE = "Data Gagal Dihapus!";
    public static $UPDATE_RESPONSE = "Data Berhasil Diubah!";
    public static $FAIL_UPDATE_RESPONSE = "Data Gagal Diubah!";
    public static $NOT_FOUND_RESPONSE = "Data Gagal Ditemukan!";
    public static $NO_DATA_AVAILABLE = "Tidak ada data yang tersedia";

    public static $required = "Field harus diisi!";
    public static $not_image = "File harus gambar";
    public static $max_size_file = "File harus dibawah 2 MB";
    public static $topUp = "Top up berhasil";
    public static $topUp_fail = "Top up berhasil";

    public static $LOGIN_SUCCESS = "Berhasil masuk";
    public static $PASSWORD_NOT_DEFINE = "kata sandi belum disetel";
    public static $NOT_USER = "Selain user tidak bisa masuk";
    public static $NOT_ADMIN = "Selain admin tidak bisa masuk";
    public static $LOGIN_INVALID = "Email atau password salah";
    public static $LOGIN_FAILED = "Email atau password tidak sesuai";
    public static $EMAIL_NOT_MATCH = "Email tidak sesuai";
    public static $UNAUTHORIZED =   "Unauthorized";
}
