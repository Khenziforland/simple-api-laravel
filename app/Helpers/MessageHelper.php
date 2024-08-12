<?php

namespace App\Helpers;

class MessageHelper
{
    /**
     ** Unauthenticated.
     *
     * @return string
     */
    public static function unauthenticated()
    {
        return "Belum authentikasi !";
    }

    /**
     ** Validate success.
     *
     * @return string
     */
    public static function validateSuccess()
    {
        return "Validasi berhasil !";
    }

    /**
     ** Validate fail.
     *
     * @return string
     */
    public static function validateFail()
    {
        return "Validasi gagal !";
    }

    /**
     ** Register success.
     *
     * @return string
     */
    public static function registerSuccess()
    {
        return "Registerasi berhasil !";
    }

    /**
     ** Register fail.
     *
     * @return string
     */
    public static function registerFail()
    {
        return "Registerasi gagal !";
    }

    /**
     ** Login success.
     *
     * @return string
     */
    public static function loginSuccess()
    {
        return "Login berhasil !";
    }

    /**
     ** Login fail.
     *
     * @return string
     */
    public static function loginFail()
    {
        return "Login gagal !";
    }

    /**
     ** Logout success.
     *
     * @return string
     */
    public static function logoutSuccess()
    {
        return "Logout berhasil !";
    }

    /**
     ** Logout fail.
     *
     * @return string
     */
    public static function logoutFail()
    {
        return "Logout gagal !";
    }

    /**
     ** Retrieve success.
     *
     * @return string
     */
    public static function retrieveSuccess()
    {
        return "Data berhasil diambil !";
    }

    /**
     ** Retrieve fail.
     *
     * @return string
     */
    public static function retrieveFail()
    {
        return "Data gagal diambil !";
    }

    /**
     ** Save success.
     *
     * @return string
     */
    public static function saveSuccess()
    {
        return "Data berhasil disimpan !";
    }

    /**
     ** Save fail.
     *
     * @return string
     */
    public static function saveFail()
    {
        return "Data gagal disimpan !";
    }

    /**
     ** Delete success.
     *
     * @return string
     */
    public static function deleteSuccess()
    {
        return "Data berhasil dihapus !";
    }

    /**
     ** Delete fail.
     *
     * @return string
     */
    public static function deleteFail()
    {
        return "Data gagal dihapus !";
    }
}
