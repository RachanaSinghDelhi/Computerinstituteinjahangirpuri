@php
    // Set banner image and breadcrumbs
    $bannerImage = asset('assets/images/Sliders_image/medal1_nice_computer_institute_jahangirpuri.jpg');
  
@endphp
@extends('layout.app')
@section('title', "FAQ\'s")
@section('content')
<div class="container py-5">
    <h2 class="text-center mb-4 animate__animated animate__fadeIn">Frequently Asked Questions (FAQs)</h2>
    <div class="accordion" id="faqAccordion">
        
        <!-- FAQ 1 -->
        <div class="accordion-item animate__animated animate__fadeIn">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    When was Nice Computer Institute established?
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Nice Computer Institute has been providing quality education since its establishment in 2001.
                </div>
            </div>
        </div>

        <!-- FAQ 2 -->
        <div class="accordion-item animate__animated animate__fadeIn">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Where is Nice Computer Institute located?
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Our institute is situated at A1-9/10, A Block Rd, near Da Pizza Palace, Bhalswa Jahangirpuri, Jahangirpuri, Delhi, 110033. Visit us to explore our modern facilities and classrooms.
                </div>
            </div>
        </div>

        <!-- FAQ 3 -->
        <div class="accordion-item animate__animated animate__fadeIn">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    What courses does Nice Computer Institute offer?
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    We offer a diverse range of courses, including programming languages, web development, graphic design, and more. Our courses are designed to meet industry standards and cater to various skill levels.
                </div>
            </div>
        </div>

        <!-- FAQ 4 -->
        <div class="accordion-item animate__animated animate__fadeIn">
            <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    Are the instructors experienced and qualified?
                </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Yes, our faculty comprises highly qualified and experienced professionals with a strong background in the computer industry. They bring real-world insights to the classroom, ensuring a practical learning experience.
                </div>
            </div>
        </div>

        <!-- FAQ 5 -->
        <div class="accordion-item animate__animated animate__fadeIn">
            <h2 class="accordion-header" id="headingFive">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                    Does Nice Computer Institute provide placement assistance?
                </button>
            </h2>
            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Absolutely! We have a dedicated placement cell that actively collaborates with leading companies. Our goal is to assist students in securing internships and job placements through workshops, seminars, and networking opportunities.
                </div>
            </div>
        </div>

        <!-- FAQ 6 -->
        <div class="accordion-item animate__animated animate__fadeIn">
            <h2 class="accordion-header" id="headingSix">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                    Can I visit the institute before enrolling?
                </button>
            </h2>
            <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Certainly! We encourage prospective students to visit our campus, interact with faculty, and explore our facilities. You can find us at A1-9/10, A Block Rd, near Da Pizza Palace, Bhalswa Jahangirpuri, Jahangirpuri, Delhi, 110033.
                </div>
            </div>
        </div>

        <!-- FAQ 7 -->
        <div class="accordion-item animate__animated animate__fadeIn">
            <h2 class="accordion-header" id="headingSeven">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                    How can I contact Nice Computer Institute for more information?
                </button>
            </h2>
            <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    For any inquiries, you can reach out to us through our contact page on the website or by visiting our campus during office hours. We are here to assist you with information regarding courses, admissions, and general inquiries.
                </div>
            </div>
        </div>

        <!-- FAQ 8 -->
        <div class="accordion-item animate__animated animate__fadeIn">
            <h2 class="accordion-header" id="headingEight">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                    Does Nice Computer Institute provide online courses?
                </button>
            </h2>
            <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Yes, we offer online courses to provide flexibility for students who prefer remote learning. Explore our website or contact us for more details on available online courses.
                </div>
            </div>
        </div>

        <!-- FAQ 9 -->
        <div class="accordion-item animate__animated animate__fadeIn">
            <h2 class="accordion-header" id="headingNine">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                    What extracurricular activities are available at Nice Computer Institute?
                </button>
            </h2>
            <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    We believe in holistic development. Nice Computer Institute organizes various extracurricular activities, workshops, and events to enhance students’ overall skills and foster a well-rounded learning experience.
                </div>
            </div>
        </div>

        <!-- FAQ 10 -->
        <div class="accordion-item animate__animated animate__fadeIn">
            <h2 class="accordion-header" id="headingTen">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                    Is Nice Computer Institute affiliated with any recognized boards or institutions?
                </button>
            </h2>
            <div id="collapseTen" class="accordion-collapse collapse" aria-labelledby="headingTen" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Yes, we are affiliated with ISO 9001:2015, ensuring that our courses meet industry standards and are recognized by employers.
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
