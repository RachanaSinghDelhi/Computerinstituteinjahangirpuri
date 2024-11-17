@extends('layout.app')

@section('title', 'Home')
@section('content')
  
<!-- Include body content -->

<main>
        <!-- About 1 - Bootstrap Brain Component -->
        <div class="container container-fluid">
        <h1 class="display-3 text-center">Unlock Your Potential
        Nice Computer Institute in Jahangirpuri</h1>
        <section1 style="margin-top:50px;">
            <h1 class=" text-center"><b>Introduction</b></h1>

            <hr>

         
                <div class="row gy-3 gy-md-4 gy-lg-0 align-items-lg-center">
                    <div class="col-12 col-lg-6 col-xl-5">
                    <img class="img-fluid img-thumbnail" src="{{ asset('assets/images/manager_computer-institute-in-jahangirpuri.jpeg') }}"  alt="Manager at Computer Institute in Jahangirpuri">

                    </div>
                    <div class="col-12 col-lg-6 col-xl-7 bg-light">
                        <div class="row justify-content-xl-center">
                            <div class="col-12 col-xl-11">
                                <h2 class="h1 py-4 mb-3">Who Are We?</h2>
                                <p class="lead fs-4 text-secondary mb-3 ">Best Computer Training in Jahangirpuri </p>
                                <p class="mb-5">Best Computer Training in Jahangirpuri at Nice Computer Institute Nice Computer Institute also provides you with the best Computer Training in Jahangirpuri welcomes you ​​​​​​​​ ​​​​​​​​to explore the unlimited boundaries..</p>
                                 <p ><a href="{{ route('introduction.page') }}" class="btn btn-btn-primary">Read more</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section1>
    </main>
    <br><br>
    <section4>

        <div class="bg-danger text-center">
            <h1 class="fw-bolder text-white p-5 ">THE BEST PRICING WE OFFER &nbsp;&nbsp; &nbsp;<a href="tel:9312945741"><button class="btn btn-outline-light btn-lg" style="border-radius:50px;">Call Now 9312945741</button></a></h1>

        </div>

    </section4>
    <section2>
    <h1 class="display-2 text-center py-5">World Class Education</h1>

    <div class="container">
        <div class="row">
            @foreach ($courses as $course)
                <div class="col-md-4 p-4">
                    <div class="page-section bg-light" style="width: 24rem;">
                        <div class="card-body text-center">
                            <!-- Display course image -->
                            @if($course->course_image)
                            <img 
                                    src="{{ asset('storage/courses/' . $course->course_image) }}" 
                                    alt="{{ $course->course_title }}" 
                                    class="img-fluid mb-3" 
                                    style="width: 100%; height: 200px; object-fit: cover; border-radius: 8px;">
                                    
                            @else
                                <h5 class="card-title"><i class="fa fa-book" style="font-size:48px;"></i></h5>
                            @endif
                            <!-- Course Title -->
                            <h2 class="card-subtitle mb-2 text-muted">{{ $course->course_title }}</h2>
                            <!-- Course Description -->
                            <p class="blockquote">{{ \Illuminate\Support\Str::limit($course->course_desc, 100) }}</p>
                            <!-- Read More Button -->
                            <a href="{{ url('/course/' . $course->course_url) }}" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section2>



    <section3 py-4>
        <h1 class="display-2 text-center py-5">Why Nice Computer Institute</h1>
        <div class="container container-fluid">
            <div class="row">
                <div class="col-md-6"><img src="{{ asset('assets/images/medal5_nice_computer_institute_jahangirpuri.jpg') }}" class="img-fluid" alt="Medal at Nice Computer Institute in Jahangirpuri">
</div>
                <div class="col-md-6 bg-light p-5">
                    <h2 class="display-5">About Us</h2>
                    <p class="blockquote py-4">Nice Computer Institute is one of the best since 2001.Some of the computer courses offered are graphic design, Marg Tally,Adv.Exl,Web Design & development,Basic,busy and many more.​ Our education process facilitates ...</p>
                   <p> <a class="btn btn-success"  href="/about">Learn More</a></p>
                </div>
            </div>
        </div>
    </section3>
    <br><br><br><br>
    <section4>

        <div class="bg-danger text-center">
            <h1 class="fw-bolder text-white p-5 ">TRUSTED BY OVER 10,000 STUDENTS &nbsp;&nbsp; &nbsp;<button class="btn btn-outline-light btn-lg" style="border-radius:50px;">Get Started</button></h1>

        </div>

    </section4>
    <br><br><br><br>
    <section6>
        <h1 class="display-2 text-center py-4">Features</h1>

        <hr>

        <div class="container container-fluid">

            <p>When highlighting the features of Nice Computer Institute in Jahangirpuri, it's essential to know comprehensive information of list of features you might consider:</p>
            <div class="row gy-4 gy-md-0 gx-xxl-5X">
                <div class="col-12 col-md-6">
                    <div class="d-flex">
                        <div class="me-4 text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
                                <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="mb-3">Expert Faculty</h4>
                            <p class="text-secondary mb-0">Our team of experienced and certified instructors bring real-world expertise to the classroom, ensuring that our students receive top-notch education.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="d-flex">
                        <div class="me-4 text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-fire" viewBox="0 0 16 16">
                                <path d="M8 16c3.314 0 6-2 6-5.5 0-1.5-.5-4-2.5-6 .25 1.5-1.25 2-1.25 2C11 4 9 .5 6 0c.357 2 .5 4-2 6-1.25 1-2 2.729-2 4.5C2 14 4.686 16 8 16Zm0-1c-1.657 0-3-1-3-2.75 0-.75.25-2 1.25-3C6.125 10 7 10.5 7 10.5c-.375-1.25.5-3.25 2-3.5-.179 1-.25 2 1 3 .625.5 1 1.364 1 2.25C11 14 9.657 15 8 15Z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="mb-3">State-of-the-Art Facilities:</h4>
                            <p class="text-secondary mb-0">Nice Computer Institute boasts modern classrooms, advanced computer labs, and the latest software and hardware to facilitate an immersive learning experience.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row gy-4 gy-md-0 gx-xxl-5X py-4">

                <div class="col-md-6">
                    <div class="d-flex">
                        <div class="me-4 text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" viewBox="0 0 512 512">
                                <path d="M368.4 18.3L312.7 74.1 437.9 199.3l55.7-55.7c21.9-21.9 21.9-57.3 0-79.2L447.6 18.3c-21.9-21.9-57.3-21.9-79.2 0zM288 94.6l-9.2 2.8L134.7 140.6c-19.9 6-35.7 21.2-42.3 41L3.8 445.8c-3.8 11.3-1 23.9 7.3 32.4L164.7 324.7c-3-6.3-4.7-13.3-4.7-20.7c0-26.5 21.5-48 48-48s48 21.5 48 48s-21.5 48-48 48c-7.4 0-14.4-1.7-20.7-4.7L33.7 500.9c8.6 8.3 21.1 11.2 32.4 7.3l264.3-88.6c19.7-6.6 35-22.4 41-42.3l43.2-144.1 2.8-9.2L288 94.6z" />
                            </svg>
                        </div>

                        <div>
                            <h4 class="mb-3">Quality Education:</h4>
                            <p class="text-secondary mb-0">Nice computer Insitute in Jahangirpuri Emphasize the institute's commitment to delivering high-quality computer education.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="d-flex">
                        <div class="me-4 text-primary">
                            <i class="fa fa-award-solid"></i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" viewBox="0 0 384 512">
                                <path d="M173.8 5.5c11-7.3 25.4-7.3 36.4 0L228 17.2c6 3.9 13 5.8 20.1 5.4l21.3-1.3c13.2-.8 25.6 6.4 31.5 18.2l9.6 19.1c3.2 6.4 8.4 11.5 14.7 14.7L344.5 83c11.8 5.9 19 18.3 18.2 31.5l-1.3 21.3c-.4 7.1 1.5 14.2 5.4 20.1l11.8 17.8c7.3 11 7.3 25.4 0 36.4L366.8 228c-3.9 6-5.8 13-5.4 20.1l1.3 21.3c.8 13.2-6.4 25.6-18.2 31.5l-19.1 9.6c-6.4 3.2-11.5 8.4-14.7 14.7L301 344.5c-5.9 11.8-18.3 19-31.5 18.2l-21.3-1.3c-7.1-.4-14.2 1.5-20.1 5.4l-17.8 11.8c-11 7.3-25.4 7.3-36.4 0L156 366.8c-6-3.9-13-5.8-20.1-5.4l-21.3 1.3c-13.2 .8-25.6-6.4-31.5-18.2l-9.6-19.1c-3.2-6.4-8.4-11.5-14.7-14.7L39.5 301c-11.8-5.9-19-18.3-18.2-31.5l1.3-21.3c.4-7.1-1.5-14.2-5.4-20.1L5.5 210.2c-7.3-11-7.3-25.4 0-36.4L17.2 156c3.9-6 5.8-13 5.4-20.1l-1.3-21.3c-.8-13.2 6.4-25.6 18.2-31.5l19.1-9.6C65 70.2 70.2 65 73.4 58.6L83 39.5c5.9-11.8 18.3-19 31.5-18.2l21.3 1.3c7.1 .4 14.2-1.5 20.1-5.4L173.8 5.5zM272 192a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM1.3 441.8L44.4 339.3c.2 .1 .3 .2 .4 .4l9.6 19.1c11.7 23.2 36 37.3 62 35.8l21.3-1.3c.2 0 .5 0 .7 .2l17.8 11.8c5.1 3.3 10.5 5.9 16.1 7.7l-37.6 89.3c-2.3 5.5-7.4 9.2-13.3 9.7s-11.6-2.2-14.8-7.2L74.4 455.5l-56.1 8.3c-5.7 .8-11.4-1.5-15-6s-4.3-10.7-2.1-16zm248 60.4L211.7 413c5.6-1.8 11-4.3 16.1-7.7l17.8-11.8c.2-.1 .4-.2 .7-.2l21.3 1.3c26 1.5 50.3-12.6 62-35.8l9.6-19.1c.1-.2 .2-.3 .4-.4l43.2 102.5c2.2 5.3 1.4 11.4-2.1 16s-9.3 6.9-15 6l-56.1-8.3-32.2 49.2c-3.2 5-8.9 7.7-14.8 7.2s-11-4.3-13.3-9.7z" />
                            </svg>
                        </div>

                        <div>
                            <h4 class="mb-3">Certification Programs:</h4>
                            <p class="text-secondary mb-0">At Nice Computer Institute mention any certification programs or partnerships with industry leaders that add value to the students' resumes.</p>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row gy-4 gy-md-0 gx-xxl-5X">
                <div class="col-12 col-md-6">
                    <div class="d-flex">
                        <div class="me-4 text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" viewBox="0 0 640 512">
                                <path d="M64 96c0-35.3 28.7-64 64-64H512c35.3 0 64 28.7 64 64V352H512V96H128V352H64V96zM0 403.2C0 392.6 8.6 384 19.2 384H620.8c10.6 0 19.2 8.6 19.2 19.2c0 42.4-34.4 76.8-76.8 76.8H76.8C34.4 480 0 445.6 0 403.2zM281 209l-31 31 31 31c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-48-48c-9.4-9.4-9.4-24.6 0-33.9l48-48c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9zM393 175l48 48c9.4 9.4 9.4 24.6 0 33.9l-48 48c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l31-31-31-31c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="mb-3">Practical Training:</h4>
                            <p class="text-secondary mb-0">Emphasize hands-on learning experiences, practical projects, and real-world applications to bridge the gap between theory and practice.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="d-flex">
                        <div class="me-4 text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" viewBox="0 0 448 512">
                                <path d="M219.3 .5c3.1-.6 6.3-.6 9.4 0l200 40C439.9 42.7 448 52.6 448 64s-8.1 21.3-19.3 23.5L352 102.9V160c0 70.7-57.3 128-128 128s-128-57.3-128-128V102.9L48 93.3v65.1l15.7 78.4c.9 4.7-.3 9.6-3.3 13.3s-7.6 5.9-12.4 5.9H16c-4.8 0-9.3-2.1-12.4-5.9s-4.3-8.6-3.3-13.3L16 158.4V86.6C6.5 83.3 0 74.3 0 64C0 52.6 8.1 42.7 19.3 40.5l200-40zM111.9 327.7c10.5-3.4 21.8 .4 29.4 8.5l71 75.5c6.3 6.7 17 6.7 23.3 0l71-75.5c7.6-8.1 18.9-11.9 29.4-8.5C401 348.6 448 409.4 448 481.3c0 17-13.8 30.7-30.7 30.7H30.7C13.8 512 0 498.2 0 481.3c0-71.9 47-132.7 111.9-153.6z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="mb-3">Placement Assistance:</h4>
                            <p class="text-secondary mb-0">Highlight any placement assistance or career services offered to help students secure job opportunities upon completion of their courses.</p>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row gy-4 gy-md-0 gx-xxl-5X py-4">
                <div class="col-12 col-md-6">
                    <div class="d-flex">
                        <div class="me-4 text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" viewBox="0 0 512 512">
                                <path d="M315.4 15.5C309.7 5.9 299.2 0 288 0s-21.7 5.9-27.4 15.5l-96 160c-5.9 9.9-6.1 22.2-.4 32.2s16.3 16.2 27.8 16.2H384c11.5 0 22.2-6.2 27.8-16.2s5.5-22.3-.4-32.2l-96-160zM288 312V456c0 22.1 17.9 40 40 40H472c22.1 0 40-17.9 40-40V312c0-22.1-17.9-40-40-40H328c-22.1 0-40 17.9-40 40zM128 512a128 128 0 1 0 0-256 128 128 0 1 0 0 256z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="mb-3">Affordable Tuition Fees:</h4>
                            <p class="text-secondary mb-0">Here at Nice Computer Institute fee structures starting from 1000 Rs/Month, scholarships, or financial aid options are available to make education accessible.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="d-flex">
                        <div class="me-4 text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" viewBox="0 0 512 512">
                                <path d="M160 96a96 96 0 1 1 192 0A96 96 0 1 1 160 96zm80 152V512l-48.4-24.2c-20.9-10.4-43.5-17-66.8-19.3l-96-9.6C12.5 457.2 0 443.5 0 427V224c0-17.7 14.3-32 32-32H62.3c63.6 0 125.6 19.6 177.7 56zm32 264V248c52.1-36.4 114.1-56 177.7-56H480c17.7 0 32 14.3 32 32V427c0 16.4-12.5 30.2-28.8 31.8l-96 9.6c-23.2 2.3-45.9 8.9-66.8 19.3L272 512z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="mb-3">Flexible Learning Options:</h4>
                            <p class="text-secondary mb-0">Batches strating from 7AM in the morning till 8PM in the evening and students pick the batch time according their convinience also the flexibility in time fixes for those alredy in job feild and colledge going students,or part-time courses to cater to the diverse needs of students.</p>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section6>

    @endsection