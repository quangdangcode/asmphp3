<div class="container-fluid bg-light pt-5 px-sm-3 px-md-5">
    <div class="row">
        <div class="col-lg-3 col-md-6 mb-5">
            <a href="index.html" class="navbar-brand">
                <h1 class="mb-2 mt-n2 display-5 text-uppercase"><span class="text-primary">Phòng </span>Tin tức</h1>
            </a>
            <p>Báo tiếng Việt nhiều người xem nhất
                Thuộc Bộ Khoa học và Công nghệ
                Số giấy phép: 548/GP-BTTTT ngày 24/08/2021</p>
            <div class="d-flex justify-content-start mt-4">
                <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;"
                    href="#"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;"
                    href="#"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;"
                    href="#"><i class="fab fa-linkedin-in"></i></a>
                <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;"
                    href="#"><i class="fab fa-instagram"></i></a>
                <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;"
                    href="#"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
            <h4 class="font-weight-bold mb-4">Danh mục</h4>
            <div class="d-flex flex-wrap m-n1">
                @foreach ($category as $cate)
                    <a href="" class="btn btn-sm btn-outline-secondary m-1">{{ $cate->name }}</a>
                @endforeach
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
            <h4 class="font-weight-bold mb-4">Thẻ</h4>
            <div class="d-flex flex-wrap m-n1">
                <a href="" class="btn btn-sm btn-outline-secondary m-1">Chính trị</a>
                <a href="" class="btn btn-sm btn-outline-secondary m-1">Kinh doanh</a>
                <a href="" class="btn btn-sm btn-outline-secondary m-1">Doanh nghiệp</a>
                <a href="" class="btn btn-sm btn-outline-secondary m-1">Thể thao</a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
            <h4 class="font-weight-bold mb-4">Đường dẫn</h4>
            <div class="d-flex flex-column justify-content-start">
                <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right text-dark mr-2"></i>Giới
                    thiệu</a>
                <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right text-dark mr-2"></i>Quảng
                    cáo</a>
                <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right text-dark mr-2"></i>Quyền
                    riêng tư &
                    chính sách</a>
                <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right text-dark mr-2"></i>Điều khoản
                    &
                    điều kiện</a>
                <a class="text-secondary" href="#"><i class="fa fa-angle-right text-dark mr-2"></i>Liên hệ</a>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid py-4 px-sm-3 px-md-5">
    <p class="m-0 text-center">
        &copy; <a class="font-weight-bold" href="#">Your Site Name</a>. All Rights Reserved.

        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
        Designed by <a class="font-weight-bold" href="https://htmlcodex.com">HTML Codex</a>
    </p>
</div>
