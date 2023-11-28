<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class MahasiswaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        if (request()->routeIs('students.store')) {
            $jurusan_id = 'required';
        } elseif (request()->routeIs('students.update')) {
            $jurusan_id = 'sometimes';
        }

        return [
            'nim'        => ['required', Rule::unique('mahasiswas', 'nim')->ignore($this->student, "id")],
            'nama_mhs'   => 'required|max:50',
            'slug'       => [Rule::unique('mahasiswas', 'slug')->ignore($this->student, "id")],
            'jk'         => 'required',
            'kelas_id'   => 'required',
            'jurusan_id' => $jurusan_id,
            'no_hp'      => 'required|max:13',
            'alamat'     => 'required',
            'dosen_id'   => 'required',
            'ormawa_id'  => 'sometimes'
        ];
    }

    public function attributes()
    {
        return [
            'nama_mhs'  => 'nama mahasiswa',
            'dosen_id'  => 'dosen',
            'ormawa_id' => 'ormawa',
            'kelas_id'  => 'kelas',
        ];
    }

    public function messages()
    {
        return [
            'required'    => ':attribute tidak boleh kosong, harap diisi!',
            'unique'      => ':attribute ini sudah digunakan, silahkan masukan :attribute yang lain!',
            'max'         => 'Maksimal :attribute harus :max karakter',
        ];
    }
}