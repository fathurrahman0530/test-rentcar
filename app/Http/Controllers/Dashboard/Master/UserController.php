<?php

namespace App\Http\Controllers\Dashboard\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\Master\UserRequest;
use App\Repositories\Dashboard\Master\User\UserRepository;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    /* ===================== */
    /* | get data          | */
    /* ===================== */
    public function index()
    {
        $response = $this->userRepository->getAll();

        /*return response()->json($response);*/
        return view('dashboard.master.user.index', compact('response'));
    }

    public function add()
    {
        return view('dashboard.master.user.add');
    }

    public function detail($id)
    {
        $data = $this->userRepository->get($id);
        return view('dashboard.master.user.detail', compact('data'));
    }

    public function edit($id)
    {
        // UUID User
        // UUID Biodata
        $data = $this->userRepository->getDetail($id);

        return view('dashboard.master.user.edit', compact('data'));
    }
    /* ===================== */
    /* | end get data      | */
    /* ===================== */

    /* ===================== */
    /* | store data        | */
    /* ===================== */
    public function store(UserRequest $r)
    {
        $responseUser = $this->userRepository->store($r->user);
        $responseBiodata = $this->userRepository->storeBio($r->biodatas);

        if (isset($responseUser->uuid) && isset($responseBiodata->uuid)) {
            Alert::success('Berhasil', 'Brand berhasil ditambahkan...!!');
            return redirect()->route('db.master.user');
        } else {
            Alert::error('Gagal', 'Brand gagal ditambahkan...!!');
            return redirect()->back();
        }
    }
    /* ===================== */
    /* | end store data    | */
    /* ===================== */

    /* ===================== */
    /* | update data       | */
    /* ===================== */
    public function update(UserRequest $r)
    {
        $responseUser = $this->userRepository->update('uuid', $r->user['uuid'], $r->user['data']);
        $responseBio = $this->userRepository->updateBio('uuid', $r->biodatas['uuid'], $r->biodatas['data']);

        if ($responseUser == 1 && $responseBio == 1) {
            Alert::success('Berhasil', 'Brand berhasil diperbarui...!!');
            return redirect()->route('db.master.user');
        } else {
            Alert::error('Gagal', 'Brand gagal diperbarui...!!');
            return redirect()->back();
        }
    }
    /* ===================== */
    /* | end update data   | */
    /* ===================== */

    /* ===================== */
    /* | destroy data      | */
    /* ===================== */
    public function destroy(UserRequest $r)
    {
        $responUser = $this->userRepository->destroy('uuid', $r->user['uuid']);
        $responseBio = $this->userRepository->destroyBio('uuid', $r->biodatas['uuid']);

        if ($responUser == 1 && $responseBio == 1) {
            Alert::success('Berhasil', 'Brand berhasil dihapus...!!');
            return redirect()->route('db.master.user');
        } else {
            Alert::error('Gagal', 'Brand gagal dihapus...!!');
            return redirect()->back();
        }
    }
    /* ===================== */
    /* | end destroy data  | */
    /* ===================== */
}
