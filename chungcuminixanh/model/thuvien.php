
<?php
//Tầng MODEL thực các nghiệp vụ của chương trình 
//Khai báo đối tượng LIB: OOP
class LIB
{
		 
	//Phương thức ketnoi: có nhiệm chạy các hàm kết nối CSDL
	public function ketnoi($host,$user,$pass,$database_name)
	{
		
		//Chạy hàm kết nối CSDL
		if(!mysql_connect($host,$user,$pass))
		die('Connection Error!');//In ra thông báo nếu hàm kết nối ko thành công
		//Chạy hàm lựa chọn CSDL
		if(!mysql_select_db($database_name))
		die('Database Error!');//In ra thông báo nếu hàm lựa chọn ko thành công
		//Chạy lệnh xác định CSDL với font là utf8
		mysql_query("SET NAMES 'utf8'");
	}
	
	private $page,$n;
	//Phương thức "selectall"
	public function selectall($sql,$p=0,$start=0)
	{
		
		$re=mysql_query($sql);//Chạy câu lệnh SQL truyền vào và gán giá trị trả về lên biến $re
		
		if($p>0){
			$num=mysql_num_rows($re);//Hàm lấy ra tổng số dòng trả về trong 1 câu lệnh SQL
			$this->page=ceil($num/$p);//Làm tròn số (luôn làm tròn lên)
			//Nếu có biến n trên URL thì gán vào biến n, nếu ko có thì mặc định giá trị 1
			if(isset($_GET['n']))$n=$_GET['n']; else $n=1;
			if($n>$this->page) $n=$this->page;
			if($n<1)$n=1;
			$this->n=$n;
			//Xây dựng công thức tính thứ tự bản ghi sẽ lấy
			$thutu=($n-1)*$p;
			//Thay đổi câu lệnh SQL truyền vào: nối thêm lệnh LIMIT vào cho nó
			if(isset($start)&& $start!=0)
			{
				$sql.=" LIMIT $start, $p";
			}
			else
			{	
				$sql.=" LIMIT $thutu , $p";
			}
			//Sau khi có lệnh SQL mới thì cần phải chạy câu lệnh mới đó
			$re=mysql_query($sql);
		}
		
		//Sử dụng vòng lặp để trả về mảng 2 chiều
		while($data[]=mysql_fetch_array($re));
		return $data;//Phương thức trả về mảng 2 chiều
	}
	//Phương thức viewpage: Hiển thị danh sách phân trang cho người dùng lựa chọn 
	//Đối số $link: đường dẫn chưa link phân trang cho danh sách dữ liệu
	public function viewpage($link)
	{
		echo '<a href="'.$link.'1">Đầu</a> ';
		//Vòng lặp hiển thị danh sách trang bắt đầu từ 1 cho đến hết
		$truoc=$this->n-1;
		if($truoc>0)echo '<a href="'.$link.$truoc.'">Trước</a> ';
		$begin=$this->n-4;
		if($begin<1)$begin=1;
		$end=$this->n+5;
		if($end>$this->page)$end=$this->page;
		
		for($i=$begin;$i<=$end;$i++)
		{
			//Hiển thị đường link phân trang cho người dùng click
			if($i==$this->n)$class='active';else $class='';
			echo '<a href="'.$link.$i.'" class="'.$class.'">'.$i.'</a> ';
		}
		$tiep=$this->n+1;
		if($tiep<=$this->page)echo '<a href="'.$link.$tiep.'">Tiếp</a> ';
		echo '<a href="'.$link.$this->page.'">Cuối</a> ';
	}
	//Phương thức "selectone"
	public function selectone($sql)
	{
		$re=mysql_query($sql);//Chạy câu lệnh SQL truyền vào và gán giá trị trả về lên biến $re
		//Sử dụng vòng lặp để trả về mảng 1 chiều	
		$row = mysql_fetch_object($re);
		return $row;//Phương thức trả về mảng 1 chiều
	}
	//PT insert: thêm dữ liệu trong mảng truyền vào lưu vào bảng tương ứng trong CSDL
	public function insert($tbname,$data="")
	{
		//gan ten truong = strcot , gia tri = strvalue
		$strcot=$strvalue="";
		foreach($data as $key=>$item){
			$strcot.=$key.',';
			$strvalue.="'".$item."',";
			$dulieu[]=$item;
		}
		$stht=trim($strcot,',');//Hủy dấu phẩy ở đầu và cuối 1 chuỗi
	    $strvalue=trim($strvalue,',');
	    $stradd="INSERT INTO $tbname ($stht) VALUES ($strvalue)";
		mysql_query($stradd);	
		$id=mysql_insert_id();
		return $id;
			
	}
	//PT update: sửa  dữ liệu trong mảng truyền vào lưu vào bảng tương ứng trong CSDL
	public function update($tbname,$strkey,$id,$data='')
	{
		$strcot=$strvalue='';
		foreach($data as $key=>$item){
			$strcot.=$key.',';
			$strvalue.="".$key."='".$item."',";
			$dulieu[]=$item;
		}
		
	    $strvalue=trim($strvalue,','); //Hủy dấu phẩy ở cuối và cuối 1 chuỗi
	    $stradd="UPDATE  $tbname SET $strvalue WHERE $strkey= $id";
		mysql_query($stradd);		
	}
	
	// Phuong thuc lay IP
	function getIP(){
		$ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
		return $ip;
	}	
	//Phuong thuc xoá
	public function delete($tbname,$where,$id='')
	{
		if($id>0){//Xóa 1 dòng
			mysql_query("DELETE FROM $tbname WHERE $where='$id'");
		}
	}
	public function delete_many($tbname,$cotid,$listid)
	{
		if(isset($_POST['cbitem']) && count($_POST['cbitem']>0)){
			$listid=trim(implode(',',$_POST['cbitem']),',');
			mysql_query("DELETE FROM $tbname WHERE $cotid IN ($listid)");
		}
	}
	//phuong thuc dem so phan tu trong menu
	public function countmenu($tbname,$id_name,$id='')
	{
		$sql="select * from $tbname where $id_name='$id'";
		$num=mysql_num_rows(mysql_query($sql));
		return $num;
	}
	//Phương thức gửi mail
	public function sendmail($email,$name,$tieude,$noidung)
	{
		
		require_once('class.phpmailer.php');//Nhúng thư viện
		$mail=new PHPMailer;//Khởi tạo đối tượng gửi mail
		$mail->IsSMTP();//Mail được gửi dưới giao thức SMTP
		$mail->Host='smtp.gmail.com';//Khai báo HOST trung gian gửi mail
		$mail->Port=465;//Cổng chạy dịch vụ gửi mail của HOST trên
		$mail->SMTPAuth=true;//Bật chế độ xác thực tài khoản trên HOST
		$mail->Username='httt.k52.pro@gmail.com';//USERNAME trên gmail
		$mail->Password='hethongk52';//Password của tài khoản trên
		$mail->SMTPSecure='ssl';//Chế độ bảo mật SSL cho email
		//Phần 2: cấu hình các thông tin nội dung gửi mail
		$mail->AddAddress($email,$name);//Khai báo EMail của người nhận
		$mail->FromName='Thuong Mai Dien Tu';//Tên của người gửi Email
		$mail->AddReplyTo('luonghop.it@gmail.com');//Khai báo EMail của người nhận thư trả lời
		$mail->IsHTML(true);//Cho phép nội dung có HTML
		$mail->CharSet='utf8';//Cho phép sử dụng unicode (tiếng việt)
		$mail->Subject=$tieude;//Tiêu đề Email
		$mail->Body=$noidung;//Nội dung EMail
		$mail->Send();//Gọi Phương thức SEND để gửi email đi
		return $mail->ErrorInfo;
	}
	//PT loại bỏ ký hiệu đặc biệt
	public function makeTitle($strTitle)
	{
		$strTitle=strtolower($strTitle);
		//Code loại bỏ ký hiệu đặc biệt
		$strTitle=trim($strTitle);//Loại bỏ các dấu cách(khoảng trắng) ở đầu và cuối 1 chuỗi
		$strTitle=str_replace(' ','-',$strTitle);
		$strTitle=preg_replace("/(ò|ó|ọ|ỏ|õ|ơ|ờ|ớ|ợ|ở|ỡ|ô|ồ|ố|ộ|ổ|ỗ)/",'o',$strTitle);
		$strTitle=preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ|Ô|Ố|Ổ|Ộ|Ồ|Ỗ)/",'O',$strTitle);
		$strTitle=preg_replace("/(à|á|ạ|ả|ã|ă|ằ|ắ|ặ|ẳ|ẵ|â|ầ|ấ|ậ|ẩ|ẫ)/",'a',$strTitle);
		$strTitle=preg_replace("/(À|Á|Ạ|Ả|Ã|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ|Â|Ấ|Ầ|Ậ|Ẩ|Ẫ)/",'A',$strTitle);
		$strTitle=preg_replace("/(ề|ế|ệ|ể|ê|ễ)/",'e',$strTitle);
		$strTitle=preg_replace("/(Ể|Ế|Ệ|Ể|Ê|Ễ)/",'E',$strTitle);
		$strTitle=preg_replace("/(ừ|ứ|ự|ử|ư|ữ|ù|ú|ụ|ủ|ũ)/",'u',$strTitle);
		$strTitle=preg_replace("/(Ừ|Ứ|Ự|Ử|Ư|Ữ|Ù|Ú|Ụ|Ủ|Ũ)/",'U',$strTitle);
		$strTitle=preg_replace("/(ì|í|ị|ỉ|ĩ)/",'i',$strTitle);
		$strTitle=preg_replace("/(Ì|Í|Ị|Ì|Ĩ)/",'I',$strTitle);
		$strTitle=str_replace('đ','d',$strTitle);
		$strTitle=str_replace('Đ','D',$strTitle);
		$strTitle=preg_replace("/[^-a-zA-Z0-9]/",'',$strTitle);
		return $strTitle;
	}	
	//PT loadmenu: đa cấp gọi dữ liệu đệ quy từ bảng tbdanhmuc
	public function loadmenu($table,$parent=1,$data=array())
	{
		if($parent==1){//Nếu parent=0
			$data=$this->selectall("SELECT * FROM $table WHERE publish=1 ORDER BY parentid ASC, id DESC");
		}
		//Kiểm tra và lặp mảng data bên trên
		$count=count($data);//Lấy ra tổng số dữ liệu trong mảng data
		if($count>0){//Nếu có dữ liệu thì mới lặp
			$tim=false;
			foreach($data as $key=>$item)
			{
					if($item['parentid']==$parent){
						if($tim==false){
							$tim=true;
							echo '<ul>';
						}
						//unset($data[$key]);//Xóa bớt 1 phần tử trong mảng
						echo '<li>';
						echo '<a href="'.$url.$this->makeTitle($item['title']).'/'.$item['id'].'.html">'.$item['title'].'</a>';
						$this->loadmenu($item['id'],$data);//Gọi đệ quy
						echo '</li>';					
					}
				
			}		
			if($tim==true)echo '</ul>';
		}
	}
	private $idall='';
	//PT getall: PT đệ quy lấy tất cả id trong 1 cây danh mục
	public function getall($table,$parent=1,$data=array(),$call=0)
	{
		$this->idall.=$parent.',';
		if($call==0){
			$data=$this->selectall("SELECT * FROM $table WHERE publish=1 ORDER BY parentid ASC, id DESC");
		}
		foreach($data as $item)
		{
			
				if($item['parentid']==$parent)
				{
					$this->getall($table,$item['id'],$data,1);
				}
			
		}
		if($call==0) return $this->idall;//Trả về giá trị
		
	}
	//PT js_reload: Dưa ra thong bao va chuyen den url
	public function redirect($url){
		echo "<script> window.location='$url'; </script>";
	}
	public function formatMoney($number, $fractional=false) 
		{ 
		  
		if ($fractional) {  
			$number = sprintf('%.2f', $number);  
		}  
		while (true) {  
			$replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);  
			if ($replaced != $number) {  
				$number = $replaced;  
			} else {  
				break;  
			}  
		}  
		return $number;  
	} 
	
}


