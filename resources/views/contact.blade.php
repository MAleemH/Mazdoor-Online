@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-12 border-bottom mt-3">
            <h4 class="page-title">Contact Us</h4>
        </div>
        <div class="col-12 mt-4">
            <p>
                At Mazdoor Online, we value your feedback, questions, and concerns. We believe that open communication is essential for building strong relationships with our users. Whether you're a laborer looking for assistance, an employer with inquiries, or simply want to connect with our team, we're here to assist you. Our dedicated support team is ready to answer your queries and provide guidance. Please don't hesitate to reach out to us through the contact information provided below. Your input is crucial to our mission of continually improving our platform and serving you better. We look forward to hearing from you and helping you make the most of your experience with Mazdoor Online.
            </p>
        </div>
        <div class="col-12 mt-4 w-50 d-flex flex-column mx-auto my-auto">
            <h4 class="text-center">Contact Us Here</h4>
            <form action="" method="post">
                <div class="mb-3">
                  <label class="form-label">Full Name</label>
                  <input type="text" class="form-control" name="" placeholder="Muhammad Kashif">
                </div>
                <div class="mb-3">
                  <label class="form-label">Email</label>
                  <input type="email" class="form-control" name="" placeholder="kashif@mail.com">
                </div>
                <div class="mb-3">
                  <label class="form-label">Subject</label>
                  <input type="text" class="form-control" name="">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Description</label>
                    <textarea class="form-control" name="" id="" rows="3"></textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </form>
        </div>
    </div>
</div>
@endsection
