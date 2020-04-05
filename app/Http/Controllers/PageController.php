<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Product;
use App\ProductType;
use App\Cart; 
use App\Customer;
use App\Bill;
use App\User;
use App\BillDetail;
use Session;
use Hash;
use Auth;

class PageController extends Controller
{
    public function getLogin(){
        return view('page.login');
    }
    public function postLogin(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email',
                'password'=>'required|max:30|min:6',
            ],
            [
                'email.required'=>'Không được để trống email',
                'email.unique'=>'Vui lòng nhập đúng email',
                'password.required'=>'Không được để trống password',
                'password.max'=>'Password từ 6-30 ký tự',
                'password.min'=>'Password từ 6-30 ký tự',
            ]);
        $credentials = array('email'=>$req->email, 'password'=>$req->password);
        if(Auth::attempt($credentials)){
            return redirect()->route('trangchu');
        }
    }
    public function getSignup(){
        return view('page.signup');
    }
    public function postSignup(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email|unique:users,email',
                'password'=>'required|max:30|min:6',
                'fullname'=>'required',
                're_password'=>'required|same:password',
            ],
            [
                'email.required'=>'Không được để trống email',
                'email.unique'=>'Vui lòng nhập đúng email',
                'email.email'=>'Email đã tồn tại',
                'password.required'=>'Không được để trống password',
                'password.max'=>'Password từ 6-30 ký tự',
                'password.min'=>'Password từ 6-30 ký tự',
                'fullname.required'=>'Không được để trống fullname',
                're_password.required'=>'Không được để trống nhập lại password',
                're_password.same'=>'Mật khẩu nhập lại không đúng',
            ]);
        $user = new User;
        $user->full_name = $req->fullname;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->save();
        return redirect()->back()->with('thongbao', 'Đăng ký thành công');
    }
    public function getLogout(){
        Auth::logout();
        return redirect()->route('trangchu');
    }
    public function getTrangChu(){
        // $cart = Session::get('cart');
        // Session::forget('cart');
    	$slide = Slide::all();
    	$new_product = Product::where('new', 1)->paginate(4, ['*'], 'pag');
    	$sale_product = Product::where('promotion_price', '<>',0)->paginate(8);
    	return view('page.trangchu', compact('slide', 'new_product', 'sale_product'));
    }
    public function getLoaiSanPham($type){
    	$sp_theoloai = Product::where('id_type', $type)->paginate(6, ['*'], 'pag');
    	$sp_khac = Product::where('id_type', '<>', $type)->paginate(3);
    	$loai = ProductType::all();
    	$loai_sp = ProductType::where('id', $type)->first();
    	return view('page.loai-san-pham', compact('sp_theoloai', 'sp_khac', 'loai', 'loai_sp'));
    }
    public function getChiTietSanPham(Request $req){
    	$sanpham = Product::where('id', $req->id)->first();
    	$new_product = Product::where('new', 1)->paginate(4, ['*'], 'pag');
    	$sale_product = Product::where('promotion_price', '<>',0)->paginate(8);
    	$sanphamtt = Product::where('id_type', $sanpham->id_type)->paginate(3);
    	return view('page.chi-tiet-san-pham', compact('sanpham', 'sanphamtt', 'new_product', 'sale_product'));
    }
    public function getLienHe(){
    	return view('page.lien-he');
    }
    public function getGioiThieu(){
    	return view('page.gioi-thieu');
    }
    public function getHosting(){
        return view('page.hosting');
    }
    public function getProfile(){
        return view('page.profile');
    }
    public function getAddToCart(Request $req, $id){
        $product = Product::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        $req->Session()->put('cart', $cart);
        return redirect()->back();
    }
    public function getDelItemCart($id){
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items) > 0){
            Session::put('cart', $cart);
        }
        else{
            Session::forget('cart');
        }
        return redirect()->back();
    }
    public function getDatHang(){
        return view('page.dat-hang');
    }
    public function postDatHang(Request $req){
        $cart = Session::get('cart'); 

        $customer = new Customer;
        $customer->name = $req->name;
        $customer->gender = $req->gender;
        $customer->email = $req->email;
        $customer->address = $req->address; 
        $customer->phone_number = $req->phone;
        $customer->note = $req->notes;
        $customer->save();

        $bill = new Bill;
        $bill->id_customer = $customer->id; 
        $bill->date_order = date('Y-m-d'); 
        $bill->total = $cart->totalPrice; 
        $bill->payment = $req->payment_method; 
        $bill->note = $req->notes;
        $bill->save();

        foreach ($cart->items as $key => $value) {
            $bill_detail = new BillDetail;
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $key;
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = ($value['price']/$value['qty']);
            $bill_detail->save();
        }
        Session::forget('cart');
        return redirect()->back()->with('thongbao', 'Đặt hàng thành công');
    }
    public function getSeach(Request $req){
        $tukhoa = $req->key;
        $product = Product::where('name', 'like', "%$tukhoa%")->orWhere('unit_price', $tukhoa)->orWhere('promotion_price', $tukhoa)->paginate(4);
        return view('page.seach', compact('product', 'tukhoa'));
    }
}
