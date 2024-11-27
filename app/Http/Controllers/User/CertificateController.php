<?php

namespace App\Http\Controllers\User;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\UserCertificate;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CertificateController extends Controller
{
    public function storeImage(Request $request)
    {
        $data = UserCertificate::create([
            'user_id' => $request->user_id,
            'image' => ImageHelper::saveImage($request->image, 'assets/Images'),
        ]);

        if ($data) {
            alert()->success('success', 'Image uploaded successfully!');
            return redirect()->back();
        }
        alert()->error('error', 'Failed to upload image.');
        return redirect()->back();
    }

    public function edit($id)
    {
        $certificate = UserCertificate::findOrFail($id);
        return view('user.certificate.edit', compact('certificate'));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $certificate = UserCertificate::findOrFail($id);
        $certificate->update([
            'image' => ImageHelper::saveImage($request->image, 'assets/Images'),
        ]);
        alert()->success('Success', 'Update Complete');
        return redirect()->route('user.dashboard');
    }
}
