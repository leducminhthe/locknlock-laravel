@extends('frontend.layouts.home')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/questions.css') }}">
@endsection

@section('content')

	<link rel="stylesheet" href="{{ asset('css/core_values.css') }}">

	<section class="section-banner-area">
        <div class="align-self-center container">
            <div class="breadcrumb-banner d-flex flex-wrap justify-content-start">
                <a href="" class="text-white font-size-24">{{ trans('messages.home') }}<span class="mr-1 ml-1">/</span></a>
                <span class="text-white font-size-24 font-weight-bold">{{ trans('messages.honest') }}</span>
            </div>
        </div>
    </section>

	<div class="heading-box">
        <div class="container">
            <h1 class="page-heading py-4 py-md-5 m-0">Giá trị cốt lõi</h1>
              <div class="cv-tabs d-flex justify-content-around justify-content-md-between align-content-center flex-wrap pb-4">

                <a class="d-block tab text-center mb-2 mb-md-0 " href="trach-nhiem">Trách nhiệm</a>
                <a class="d-block tab text-center mb-2 mb-md-0 active" href="trung-thuc">Trung thực</a>
                <a class="d-block tab text-center mb-2 mb-md-0 " href="chien-dau">Chiến đấu</a>

            </div>
        </div>
    </div>

    <div class="container">
            <article class="mb-5">
                <div class="d-none d-md-block my-3">
                    <img width="1256" height="357" src="https://ntlogistics.vn/tin-tuc/wp-content/uploads/2020/02/OB82160-1.jpg" class="img-fluid wp-post-image" alt="Trung thực">
                </div>
                <div class="container-middle text-justify">
                    <div class="text-slogan">
                        <p>Tôi trân trọng lời nói của tôi.<br> Tôi nói bằng lượng hóa, không kể Câu chuyện.</p>
                    </div>

						<p>Môi trường làm việc tại Nhất Tín Logistics là môi trường làm việc phân tán. “Tôi trân trọng lời nói của tôi” là đang tuân thủ và áp dụng đúng qui trình kể cả lúc chúng ta đương đầu với khó khăn, cũng như khi chúng ta tự do không ai giám sát thì chúng ta vẫn làm điều đúng đắn. Bản thân mỗi chúng ta hành động với Integrity, chúng ta tạo ra môi trường làm việc tin cậy, là nền tảng cho mọi mối quan hệ cá nhân với Đội ngũ. Nhất Tín Logistics không thể thành công nếu chúng ta không trân trọng lời nói của mình. Và thực hiện điều này sẽ làm chúng ta khác biệt so với những tổ chức khác, trở thành một bí quyết mà không có tổ chức nào sao chép được.</p>



						<p>Integrity ở Nhất Tín Logistics là trân trọng lời nói của mình, giữ lời hứa, cam kết với khách hàng, với đồng nghiệp và với Công ty. Chúng ta làm điều chúng ta nói và làm đúng thời hạn. Chúng ta có đủ dũng cảm để lên tiếng khi thấy điều gì đó không đúng. Chúng ta từ chối sự lừa dối, hành vi lừa đảo, lợi dụng hoặc dối trá với Khách hàng, với Công ty và những đồng nghiệp của ta. Chúng ta phục vụ Khách hàng với tính thân thiện và nhiệt tình. Sau mỗi lần phục vụ, chúng ta mong muốn khách hàng của mình cảm thấy hạnh phúc. Chúng ta phục vụ khách hàng như thể hàng hóa đó là của chính người thân trong gia đình mình – những người đang tin tưởng giao hàng hóa có giá trị cho chúng ta và họ đang mong muốn hàng hóa được giữ gìn cẩn trọng, giao đến tay nhanh nhất bằng sự thân thiện và nhiệt tình.</p>



						<p>Để đảm bảo chúng ta không bị hiểu nhầm, hoặc với góc nhìn của mỗi người là khác nhau, chúng ta sẽ nói bằng con số cụ thể, vào thời điểm cụ thể và nói và hứa với ai? Chúng ta nói bằng lượng hóa cũng có nghĩa là chúng ta đang giảm thiểu dùng tính từ hình thức bóng bẩy và nịnh bợ. Dùng ngôn ngữ lượng hóa sẽ tạo ra văn hóa hội thoại rõ ràng, cho phép chúng ta khắc phục sự cố và nắm bắt nhanh cơ hội.</p>



						<p>Trong bối cảnh thuộc tâm lý, chúng ta không nên kể câu chuyện để biện minh cho việc gặp sự cố, không tìm cách đổ thừa hay trốn tránh trách nhiệm. Chúng ta không thể đưa ra quyết định sáng suốt trong hoàn cảnh mà chúng ta không phân biệt được hoặc cố tình không phân biệt được đâu là thực tế và đâu là câu chuyện. Câu chuyện là một nguyên nhân giả mà nó sẽ che giấu đi việc chúng ta đang kém hiệu quả hơn mức ta có thể đạt được. Chúng ta nhận ra đâu là thực tế để phân bổ thời gian của mình, xử lý một cách hiệu quả, suy nghĩ về các giải pháp, hành động thay vì lo lắng về các vấn đề. Hay nói một cách khác không kể câu chuyện đơn giản cũng là cuộc hội thoại truyền sức mạnh.</p>
                </div>
            </article>
        </div>

	<section style="background-image: url('{{ asset('/images/Frame 38.jpg')}}');" class="w-100 mt-2 dichvu">
	   <div class="container position-relative">
	        <div class="NT-giaohang">
	            <h2>Nhất Tín Express</h2>
	            <h1>Hơn cả 1 dịch vụ</h1>
	            <div class=" mt-3 vandon" style="">
	                <a class="" href="tao-van-don">Tạo vận đơn <img style="padding: 5px 0px;" src="{{ asset('/images/arrow.png')}}" alt=""></a>
	            </div>
	        </div>
	    </div>
	</section>
@stop
