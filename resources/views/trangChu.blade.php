@extends('layout-blog')

@section('main')
    <section>
        <h1 class="my-3">Page Heading <small>Lorem ipsum</small></h1>
        <article class="my-3">
            <div class="card">
                <img src="https://images.pexels.com/photos/261662/pexels-photo-261662.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" class="card-img-top img-fluid" alt="images/picture.jpg">
                <div class="card-body">
                    <h3 class="card-title">Post title</h3>
                    <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Harum vitae dolor quas ex pariatur! Maiores nostrum adipisci hic dolorem perspiciatis, expedita iusto, itaque nobis natus aliquam, iure illo harum dolore? Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    <a href="template-detail-blog-bootstrap.html" class="btn btn-primary">Read me <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                </div>
                <div class="card-footer">
                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                    <span>Posted on Jul 11, 2021</span><span> | </span>
                    <i class="fa fa-user-o" aria-hidden="true"></i>
                    <a href="#"><span>Tony Teo</span></a>
                </div>
            </div>
        </article>

        <article class="my-3">
            <div class="card">
                <img src="https://images.pexels.com/photos/261662/pexels-photo-261662.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" class="card-img-top img-fluid" alt="images/picture.jpg">
                <div class="card-body">
                    <h3 class="card-title">Post title</h3>
                    <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Harum vitae dolor quas ex pariatur! Maiores nostrum adipisci hic dolorem perspiciatis, expedita iusto, itaque nobis natus aliquam, iure illo harum dolore? Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    <a href="template-detail-blog-bootstrap.html" class="btn btn-primary">Read me <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                </div>
                <div class="card-footer">
                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                    <span>Posted on Jul 11, 2021</span><span> | </span>
                    <i class="fa fa-user-o" aria-hidden="true"></i>
                    <a href="#"><span>Tony Teo</span></a>
                </div>
            </div>
        </article>

        <article class="my-3">
            <div class="card">
                <img src="https://images.pexels.com/photos/261662/pexels-photo-261662.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" class="card-img-top img-fluid" alt="images/picture.jpg">
                <div class="card-body">
                    <h3 class="card-title">Post title</h3>
                    <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Harum vitae dolor quas ex pariatur! Maiores nostrum adipisci hic dolorem perspiciatis, expedita iusto, itaque nobis natus aliquam, iure illo harum dolore? Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    <a href="template-detail-blog-bootstrap.html" class="btn btn-primary">Read me <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                </div>
                <div class="card-footer">
                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                    <span>Posted on Jul 11, 2021</span><span> | </span>
                    <i class="fa fa-user-o" aria-hidden="true"></i>
                    <a href="#"><span>Tony Teo</span></a>
                </div>
            </div>
        </article>

        <!-- pagination posts -->
        <nav class="my-3">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active" aria-current="page">
                    <a class="page-link" href="#">2</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </section>
@endsection
