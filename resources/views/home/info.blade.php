<!-- Created by Ariful Islam at 03/22/2020 - 2:54 PM -->
@extends('layouts.master')
@section('custom-css')
    <link rel="stylesheet" href="{{asset('static/style/style.css')}}" />
    @endsection
@section('content')

      <div class="container">
          <div class="row">
              <!-- top buttons -->
              <div class="top-buttons">
                  <div class="col-md-12">
                      <a href="http://corona.gov.bd/covid19Test" class="col-md-6"
                      ><button class="btn btn-primary">নিজে পরীক্ষা করুন</button></a
                      >
                      <a href="#" class="col-md-6"
                      ><button
                              class="btn btn-primary"
                              data-toggle="modal"
                              data-target="#dtd"
                          >
                              দিন অনুযায়ী লক্ষণ
                          </button></a
                      >
                  </div>
              </div>
          </div>

          <!-- modal -->
          <!-- Modal (Day by Day)-->
          <div
              class="modal fade"
              id="dtd"
              tabindex="-1"
              role="dialog"
              aria-labelledby="exampleModalCenterTitle"
              aria-hidden="true"
          >
              <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button
                              type="button"
                              class="close"
                              data-dismiss="modal"
                              aria-label="Close"
                          >
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <div class="col-md-12">
                              <div class="card" style="width: 100%;">
                                  <div class="card-body">
                                      <h5 class="card-title">দিন ০১ - ০৪</h5>
                                      <p class="card-text">
                                          জ্বর, ব্যথা, শুষ্ক কাশি। ক্ষেত্র বিশেষে ডায়েরিয়া।
                                      </p>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-12">
                              <div class="card mt-4" style="width: 100%;">
                                  <div class="card-body">
                                      <h5 class="card-title">দিন ০৫-০৬</h5>
                                      <p class="card-text">
                                          শ্বাসকষ্ট শুরু হয়।
                                      </p>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-12">
                              <div class="card mt-4" style="width: 100%;">
                                  <div class="card-body">
                                      <h5 class="card-title">দিন ০৭</h5>
                                      <p class="card-text">
                                          সাধারণত ৭ম দিনে বেশিরভাগ রোগী জরুরি অবস্থায় হাসপাতালে
                                          ভর্তি হয়।
                                      </p>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-12">
                              <div class="card mt-4" style="width: 100%;">
                                  <div class="card-body">
                                      <h5 class="card-title">দিন ০৮</h5>
                                      <p class="card-text">
                                          এই দিনেই সাধারণত ভাইরাসটি ফুসফুসের নিয়ন্ত্রণ নেওয়া শুরু
                                          করে ও শ্বাসকষ্ট বিপদজনক পর্যায়ে পৌঁছে।
                                      </p>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-12">
                              <div class="card mt-4" style="width: 100%;">
                                  <div class="card-body">
                                      <h5 class="card-title">দিন ১০</h5>
                                      <p class="card-text">
                                          সাধারণত এই দিনে ICU তে যাওয়ার প্রয়োজন পড়ে। ভাইরাসটি দেহের
                                          পুরোপুরি নিয়ন্ত্রণ নিয়ে নেয়। খুব কম সংখ্যক রোগী এই পর্যায়ে
                                          মারা যায়। যদিও শতাংশের হিসেবে তা ৩%, কিন্তু সংখ্যার হিসেবে
                                          প্রচুর।
                                      </p>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-12">
                              <div class="card mt-4" style="width: 100%;">
                                  <div class="card-body">
                                      <h5 class="card-title">দিন ১৭</h5>
                                      <p class="card-text">
                                          বেচে যাওয়া রোগী সাধারণত এই সময়টাতে কিছুটা স্বাভাবিক হয়ে
                                          উঠতে শুরু করে।
                                      </p>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <!-- how to prepare -->
          <div class="col-md-12 prepare">
              <h2>
                  <img src="{{asset('static/img/covid-19.png')}}" class="icon" /> যেভাবে প্রস্তুতি নিবেন
              </h2>
              <p>COVID-19 তে আপনি আপনার পরিবারের জন্য যা করতে পারেন -</p>
              <div class="list">
                  <ul class="list-group list-group-flush">
                      <!-- find the local information -->
                      <li class="list-group-item local-info">
                          <h3>
                              <img src="{{asset('static/icons/info.svg')}}" class="icon" />স্থানীয় তথ্য সম্পর্কে
                              জ্ঞান রাখুন
                          </h3>
                          <p>
                              যথাসম্ভব দেশের ও দেশের বাইরের করোনা পরিস্থিতি সম্পর্কে জানুন।
                              সুবিধার্থে নিচে বাংলাদেশের প্রথম সারির কিছু সংবাদপত্রের করোনা
                              বিষয়ক পাতার লিংক দেওয়া হল -
                          </p>
                          <div class="news text-center">
                              <a href="https://www.prothomalo.com/live/"
                              ><button class="btn btn-primary">প্রথম আলো</button></a
                              >
                          </div>
                      </li>

                      <!-- know the sign and symptoms -->
                      <li class="list-group-item mt-3 mb-3">
                          <h3>
                              <img src="{{asset('static/img/covid-19.png')}}" class="icon" />করোনার লক্ষণ
                              সম্পর্কে জানুন
                          </h3>
                          <p>COVID-19 এর লক্ষণসমূহ সম্পর্কে জানুন ও দ্রুত পদক্ষেপ নিনঃ</p>
                          <!-- General Symptoms -->
                          <h4>
                              <img src="{{asset('static/img/covid-19.png')}}" class="icon" />সাধারণ লক্ষণসমূহ
                          </h4>
                          <p>
                              নিম্নোক্ত লক্ষণসমূহ আক্রান্তের ২ থেকে ১৪ দিনের মধ্যে দেখা যেতে
                              পারে
                          </p>
                          <ul class="list-group list-group-flush">
                              <li class="list-group-item">
                                  <img src="{{asset('static/icons/chekbox.svg')}}" class="icon" />জ্বর
                              </li>
                              <li class="list-group-item">
                                  <img src="{{asset('static/icons/chekbox.svg')}}" class="icon" />কাশি
                              </li>
                              <li class="list-group-item">
                                  <img src="{{asset('static/icons/chekbox.svg')}}" class="icon" />শ্বাসজনিত সমস্যা
                              </li>
                              <li class="list-group-item">
                                  <div class="symptom-imgs">
                                      <div class="row text-center">
                                          <div class="col-md-12">
                                              <img
                                                  class="col-md-3 symptom-img"
                                                  src="{{asset('static/img/symptoms-fever.png')}}"
                                                  alt=""
                                              />
                                              <img
                                                  class="col-md-3 symptom-img"
                                                  src="{{asset('static/img/symptoms-cough.png')}}"
                                                  alt=""
                                              />
                                              <img
                                                  class="col-md-3 symptom-img"
                                                  src="{{asset('static/img/symptoms-shortnessOfBreath.png')}}"
                                                  alt=""
                                              />
                                          </div>
                                      </div>
                                  </div>
                              </li>
                              <li class="list-group-item">
                                  <div class="emergency-warning">
                                      <p>
                                          যদি নিম্নোক্ত কোন লক্ষণ দেখা যায়, তাহলে অতি দ্রুত
                                          ডাক্তারের শরণাপন্ন হনঃ*
                                      </p>
                                      <ul class="list-group list-group-flush">
                                          <li class="list-group-item">
                                              <img
                                                  src="{{asset('static/icons/chekbox.svg')}}"
                                                  class="icon"
                                              />শ্বাসপ্রশ্বাসে সমস্যা
                                          </li>
                                          <li class="list-group-item">
                                              <img src="{{asset('static/icons/chekbox.svg')}}" class="icon" />বুকে বা
                                              গিরাতে ব্যথা অনুভূত
                                          </li>
                                          <li class="list-group-item">
                                              <img src="{{asset('static/icons/chekbox.svg')}}" class="icon" />নীলাভ ঠোট
                                              বা মুখ
                                          </li>
                                      </ul>
                                      <p class="nb">
                                          *এইগুলোর মানেই করোনা নয়, অন্য কোন রোগের লক্ষণও হতে পারে।
                                          তাই অবশ্যই ডাক্তারের শরণাপন্ন হন।
                                      </p>
                                  </div>
                              </li>
                          </ul>

                          <!-- actions -->
                          <h4><img src="{{asset('static/img/covid-19.png')}}" class="icon" />করণীয়</h4>
                          <ul class="list-group list-group-flush">
                              <li class="list-group-item">
                                  <img src="{{asset('static/icons/chekbox.svg')}}" class="icon" />অসুস্থ বোধ করলে
                                  বাসাতেই থাকুন
                              </li>
                              <li class="list-group-item">
                                  <img src="{{asset('static/icons/chekbox.svg')}}" class="icon" />জরুরী প্রয়োজনে
                                  ডাক্তারের কাছে যাওয়ার সমস্ত ব্যবস্থা প্রস্তুত রাখুন
                              </li>
                              <li class="list-group-item">
                                  <img src="{{asset('static/icons/chekbox.svg')}}" class="icon" />মানুষের সাথে
                                  দূরত্ব বজায় রাখুন
                              </li>
                          </ul>
                      </li>

                      <!-- Take Steps for Those at Higher Risk -->
                      <li class="list-group-item">
                          <h3>
                              <img src="{{asset('static/img/covid-19.png')}}" class="icon" />অতিমাত্রায়
                              ঝুকিপূর্ণ ব্যক্তিদের জন্য করনীয়
                          </h3>
                          <p>
                              COVID-19 নতুন রোগ। তাই এই সম্পর্কে খুব স্পষ্ট তথ্য পাওয়া এখনো
                              সম্ভব হয়নি। ইতোমধ্যে যেহেতু মহামারীতে রূপ নিয়েছে এই ভাইরাস,
                              সেহেতু পরিসংখ্যান অনুযায়ী জানা যায় যে বৃদ্ধ ও দুরারোগ্য রোগে
                              আক্রান্ত যে কোন বয়সের প্রাক্তন রোগী করোনা ভাইরাসে সবচেয়ে বেশি
                              ঝুঁকির মধ্যে আছে।
                          </p>
                          <ul class="list-group list-group-flush">
                              <li class="list-group-item">
                                  <p>
                                      <img src="{{asset('static/img/covid-19.png')}}" class="icon" />অন্যান্য
                                      ঝুকিপূর্ন অবস্থাঃ
                                  </p>
                                  <ul class="list-group list-group-flush">
                                      <li class="list-group-item">
                                          <img src="{{asset('static/icons/chekbox.svg')}}" class="icon" />ফুসফুসের কোন
                                          ধরনের সমস্যায় ভুগছে এমন কেউ
                                      </li>
                                      <li class="list-group-item">
                                          <img src="{{asset('static/icons/chekbox.svg')}}" class="icon" />হৃদযন্ত্রের
                                          কোন ধরনের সমস্যায় ভুগছে এমন কেউ
                                      </li>
                                      <li class="list-group-item">
                                          <img src="{{asset('static/icons/chekbox.svg')}}" class="icon" />পূর্বে
                                          ক্যান্সারের রোষানলে ছিল এমন কেউ
                                      </li>
                                      <li class="list-group-item">
                                          <img src="{{asset('static/icons/chekbox.svg')}}" class="icon" />৪০ এর উপরে
                                          BMI আছে এমন কেউ বা ডায়াবেটিস আছে এমন কেউ
                                      </li>
                                  </ul>
                              </li>
                              <li class="list-group-item">
                                  <b>নোটঃ গর্ভবতীদের অবশ্যই নিবিড় পর্যবেক্ষনে রাখতে হবে</b>
                              </li>
                          </ul>
                      </li>

                      <!-- Protect Yourself & Family -->
                      <li class="list-group-item mt-4">
                          <h3>
                              <img src="{{asset('static/img/covid-19.png')}}" class="icon" />নিজেকে ও পরিবারকে
                              বাঁচান
                          </h3>
                          <h4>
                              <img src="{{asset('static/img/covid-19.png')}}" class="icon" />ভাইরাসটি কীভাবে
                              ছড়ায়?
                          </h4>
                          <ul class="list-group list-group-flush">
                              <li class="list-group-item">
                                  <p>প্রধানত ভাইরাসটি আক্রান্ত ব্যক্তির সংস্পর্শে ছড়ায়</p>
                                  <ul class="list-group list-group-flush">
                                      <li class="list-group-item">
                                          <img src="{{asset('static/icons/chekbox.svg')}}" class="icon" />৬ ফুটের
                                          কাছাকাছি থাকা ব্যক্তি আক্রান্ত ব্যক্তি থেকে অনিরাপদ
                                      </li>
                                      <li class="list-group-item">
                                          <img src="{{asset('static/icons/chekbox.svg')}}" class="icon" />হাঁচি ও
                                          কাশির মাধ্যমে আক্রান্ত ব্যক্তি থেকে সুস্থ দেহে অতি সহজে
                                          ছড়ায়
                                      </li>
                                  </ul>
                              </li>
                              <li class="list-group-item">
                                  <img src="{{asset('static/icons/info.svg')}}" class="icon" />ভাইরাসটির মিউটেশন
                                  শুরু হয় মূলত ফুসফুস থেকে। তাই ফুসফুসে পৌঁছাতে পারে এমন যে কোন
                                  মাধ্যমই ভাইরাস ছড়ানোর জন্য দায়ী।
                              </li>
                          </ul>
                          <div class="mt-4"></div>
                          <h4>
                              <img src="{{asset('static/icons/heart.svg')}}" class="icon" />নিজেকে নিরাপদে
                              রাখবেন যেভাবে
                          </h4>
                          <ul class="list-group list-group-flush">
                              <li class="list-group-item">
                                  <img src="{{asset('static/icons/chekbox.svg')}}" class="icon" />বাইরে থেকে এসে,
                                  কারো সংস্পর্শে এসে, বা নাক ও মুখে হাত দেওয়ার পর কমপক্ষে ২০
                                  সেকেন্ড ধরে সাবান/হ্যান্ডওয়াশ দিয়ে হাত ধুতে হবে
                              </li>
                              <li class="list-group-item">
                                  <img src="{{asset('static/icons/chekbox.svg')}}" class="icon" />চোখ, নাক, ও মুখে
                                  হাত দেওয়া থেকে বিরত থাকতে হবে
                              </li>
                              <li class="list-group-item">
                                  <img src="{{asset('static/icons/chekbox.svg')}}" class="icon" />অসুস্থ ব্যক্তি
                                  থেকে দূরত্ব বজায় রাখতে হবে
                              </li>
                              <li class="list-group-item">
                                  <img src="{{asset('static/icons/chekbox.svg')}}" class="icon" />স্বাভাবিক
                                  অবস্থায় ফিরে আসা পর্যন্ত সামাজিক দূরত্ব বজায় রাখুন
                              </li>
                          </ul>

                          <div class="mt-4"></div>
                          <h4>
                              <img src="{{asset('static/icons/users.svg')}}" class="icon" />অন্যকে বাঁচাতে নিজের
                              করণীয়
                          </h4>
                          <ul class="list-group list-group-flush">
                              <li class="list-group-item">
                                  <img src="{{asset('static/icons/chekbox.svg')}}" class="icon" />অবশ্যই বাড়িতে
                                  থাকুন। ডাক্তারের কাছে যাওয়ার সময় যথাযথ প্রসূতি নিয়ে যান।
                              </li>
                              <li class="list-group-item">
                                  <img src="{{asset('static/icons/chekbox.svg')}}" class="icon" />হাঁচি দেওয়ার সময়
                                  হাতের তালু বা কনুই দিয়ে মুখ ঢাকুন।
                              </li>
                              <li class="list-group-item">
                                  <img src="{{asset('static/icons/chekbox.svg')}}" class="icon" />ব্যবহৃত টিস্যু
                                  নির্ধারিত ডাস্টবিনে ফেলুন।
                              </li>
                              <li class="list-group-item">
                                  <img src="{{asset('static/icons/chekbox.svg')}}" class="icon" />বাইরে থেকে এসে
                                  বা বাইরে যাওয়ার সময় কমপক্ষে ২০ সেকেন্ড ধরে
                                  হ্যান্ডওয়াশ/সাবান/৬০% এলকোহলযুক্ত হ্যান্ড স্যানিটাইজার দিয়ে
                                  হাত ধুতে হবে।
                              </li>
                              <li class="list-group-item">
                                  <img src="{{asset('static/icons/chekbox.svg')}}" class="icon" />যদি আক্রান্ত হন,
                                  তাহলে অবশ্যই মাস্ক পরিধান করুন।
                              </li>
                              <li class="list-group-item">
                                  <img src="{{asset('static/icons/chekbox.svg')}}" class="icon" />প্রতিদিন
                                  উল্লেখিত জিনিসগুলো পরিষ্কার করুনঃ টেবিল, দরজার হাতল, লাইট
                                  সুইচ, টেবিল, ফোন, কী-বোর্ড, টয়লেট, মেঝে, এবং সিঙ্ক।
                              </li>
                              <li class="list-group-item">
                                  <iframe
                                      src="https://www.youtube.com/embed/d914EnpU4Fo"
                                      frameborder="0"
                                      allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                      allowfullscreen
                                  ></iframe>
                              </li>
                          </ul>
                      </li>

                      <!-- Create a Household Plan -->
                      <li class="list-group-item">
                          <h3>
                              <img src="{{asset('static/icons/calender.svg')}}" class="icon" />জরুরী পরিকল্পনা
                              করুন
                          </h3>
                          <ul class="list-group list-group-flush">
                              <li class="list-group-item">
                                  <img src="{{asset('static/icons/chekbox.svg')}}" class="icon" />কমপক্ষে ২
                                  সপ্তাহের খাদ্য ও পানীয়সহ সকল জরুরি ওষুধের বন্দোবস্ত করে রাখুন।
                              </li>
                              <li class="list-group-item">
                                  <img src="{{asset('static/icons/chekbox.svg')}}" class="icon" />পরস্পরের সাথে
                                  যথাসম্ভব অনলাইন যোগাযোগ করুন।
                              </li>
                              <li class="list-group-item">
                                  <img src="{{asset('static/icons/chekbox.svg')}}" class="icon" />সকল জনসামগম ও
                                  গণসংযোগ বাতিল করুন।
                              </li>
                          </ul>
                      </li>

                      <!-- Stay Informed About Emergency Plans -->
                      <li class="list-group-item">
                          <h3>
                              <img src="{{asset('static/icons/denger.svg')}}" class="icon" />জরুরি অবস্থা
                              সম্পর্কে অবগত থাকুন
                          </h3>
                          <p>
                              ভাইরাস সম্পর্কে সরকারি ও বিশ্ব স্বাস্থ্য সংস্থার সকল বিজ্ঞপ্তি
                              সম্পর্কে অবগত থাকুন ও মেনে চলুন।
                          </p>
                      </li>
                  </ul>
              </div>
          </div>

          <div class="sources">
              <h3>সূত্রঃ</h3>
              <ul>
                  <li>
                      <img
                          src="{{asset('static/icons/right-arrow.svg')}}"
                          alt=""
                      />https://www.cdc.gov/coronavirus/2019-ncov/prepare/index.html
                  </li>
                  <li>
                      <img
                          src="{{asset('static/icons/right-arrow.svg')}}"
                          alt=""
                      />https://www.cdc.gov/coronavirus/2019-ncov/specific-groups/people-at-higher-risk.html
                  </li>
                  <li>
                      <img
                          src="{{asset('static/icons/right-arrow.svg')}}"
                          alt=""
                      />https://www.cdc.gov/coronavirus/2019-ncov/symptoms-testing/symptoms.html
                  </li>
                  <li>
                      <img
                          src="{{asset('static/icons/right-arrow.svg')}}"
                          alt=""
                      />https://www.cdc.gov/coronavirus/2019-ncov/prepare/prevention.html
                  </li>
                  <li>
                      <img
                          src="{{asset('static/icons/right-arrow.svg')}}"
                          alt=""
                      />https://www.cdc.gov/coronavirus/2019-ncov/index.html
                  </li>
                  <li>
                      <img
                          src="{{asset('static/icons/right-arrow.svg')}}"
                          alt=""
                      />https://www.businessinsider.com/coronavirus-covid19-day-by-day-symptoms-patients-2020-2
                  </li>
              </ul>
          </div>

          <p class="text-center" >এই পেজের তথ্য সংগ্রহ এবং ডিজাইনঃ <a href="https://www.facebook.com/lifeoflikhon">মেহেদী হাসান লিখন</a></p>

      </div>



    @endsection

@section('custom-js')
            <script src="{{asset('static/js/main.js')}}"></script>
    @endsection
