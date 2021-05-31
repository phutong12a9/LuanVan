<?php

namespace App\Http\Controllers;

use App\chuyenmuc;
use App\thongbao;
use DB;
use Illuminate\Http\Request;

class ThongBaoController extends Controller {
	public function getDangthongbao() {
		$chuyenmuc = chuyenmuc::all();
		return view('thongbao.dangthongbao', compact('chuyenmuc'));
	}
	public function postDangthongbao(Request $req) {
		$this->validate($req,
			[
				'tieude' => 'required', // bắt buộc
				'tomtat' => 'required', // bắt buộc
				'noidung' => 'required', // bắt buộc
			],
			[
				'tieude.required' => 'Tiêu Đề Không Được Bỏ Trống.',
				'tomtat.required' => 'Tóm Tắt Không Được Bỏ Trống.',
				'noidung.required' => 'Nội Dung Không Được Bỏ Trống.',
			]);
		$thongbao = new thongbao;
		$thongbao->ID_CM = $req->chuyenmuc;
		$thongbao->TieuDe = $req->tieude;
		$thongbao->TomTat = $req->tomtat;
		$thongbao->NoiDung = $req->noidung;
		$thongbao->NgayDang = date('Y-m-d');
		$thongbao->save();
		return redirect()->route('danh-sach-thong-bao')->with('dangthanhcong', 'Đã Đăng Thông Báo Mới.');
	}
	public function getXoathongbao($id) {
		thongbao::where('ID', $id)->delete();
		return redirect()->back()->with('xoathongbao', 'Đã xóa thông báo.');
	}
	public function getCapnhatthongbao($id) {
		$chuyenmuc = chuyenmuc::all();
		$thongbao = thongbao::where("ID", $id)->get();
		$chuyenmucthongbao = thongbao::join('chuyenmuc', 'ID_CM', 'chuyenmuc.ID')->where('thongbao.ID', $id)->select('ID_CM')->first();
		return view('thongbao.capnhatthongbao', compact('chuyenmuc', 'thongbao', 'chuyenmucthongbao'));
	}
	public function postCapnhatthongbao(Request $req) {
		$this->validate($req,
			[
				'tieude' => 'required', // bắt buộc
				'tomtat' => 'required', // bắt buộc
				'noidung' => 'required', // bắt buộc
			],
			[
				'tieude.required' => 'Tiêu Đề Không Được Bỏ Trống.',
				'tomtat.required' => 'Tóm Tắt Không Được Bỏ Trống.',
				'noidung.required' => 'Nội Dung Không Được Bỏ Trống.',
			]);
		$id = $req->id;
		$thongbao = new thongbao;
		$arr['ID_CM'] = $req->chuyenmuc;
		$arr['TieuDe'] = $req->tieude;
		$arr['TomTat'] = $req->tomtat;
		$arr['NoiDung'] = $req->noidung;
		$thongbao::where('ID', $id)->update($arr);
		return redirect()->back()->with('capnhatthanhcong', 'Đã cập nhật thành công');

	}
	public function getDanhsachthongbao() {
		$thongbao = DB::table('thongbao')->orderBy('ID', 'DESC')->get();
		return view('thongbao.danhsachthongbao', compact('thongbao'));
	}
}
