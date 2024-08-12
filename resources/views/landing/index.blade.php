@extends('layouts.landing')
@section('title',$meta_title)
@section('meta_title',$meta_title)
@section('meta_description',$meta_description)
@section('meta_keyword',$meta_keyword)
@section('meta_author',$meta_author)
@section('meta_image',$meta_image)
@section('meta_image_width',$meta_image_width)
@section('meta_image_height',$meta_image_height)
@section('content')


  <!-- ===== Hero Section Start ===== -->
  @include('landing.partials.hero')
  <!-- ===== Hero Section End ===== -->

  <!-- ===== Features Section Start ===== -->
  <section id="features" class="pt-14 sm:pt-20 lg:pt-[130px]">
    <div class="px-4 xl:container">
      <!-- Section Title -->
      <div class="relative mx-auto mb-12 max-w-[620px] pt-6 text-center md:mb-20 lg:pt-16" data-wow-delay=".2s">
        <span class="title"> {{__("FEATURES")}} </span>
        <h2 class="mb-5 font-heading text-3xl font-semibold text-dark dark:text-white sm:text-4xl md:text-[50px] md:leading-[60px]"> {{__("Unique & Awesome Core Features")}}</h2>
        <p class="text-base text-dark-text">{{__("Everything you will need to boost your work is right at your fingertips. Take a look at what you can do and how to get started.")}}</p>
      </div>
      <div class="-mx-4 flex flex-wrap justify-center">
        @foreach($ai_sidebar_group_by_id as $menu_group_id=>$menu_items)
          <?php if(empty($menu_items)) continue; ?>
          @foreach($menu_items as $menu_item)
              <?php
                  $action_url = route('dashboard');
                  $has_access = $menu_item['has_access'] ?? true;
                  $about_text = !empty($menu_item['about_text']) ? $menu_item['about_text'].' : ' : '';
              ?>
              <div class="w-full px-4 md:w-1/2 lg:w-1/3 cs-icon-lg-container">
                <div class="group mx-auto mb-10 max-w-[380px] text-center md:mb-16" data-wow-delay=".2s">
                  <div class="mx-auto mb-6 flex h-[70px] w-[70px] items-center justify-center rounded-full bg-primary bg-opacity-5 text-primary transition group-hover:bg-primary group-hover:bg-opacity-100 group-hover:text-white dark:bg-white dark:bg-opacity-5 dark:text-white dark:group-hover:bg-primary dark:group-hover:bg-opacity-100 md:mb-9 md:h-[90px] md:w-[90px]">
                    <i class="{{$menu_item['template_thumb']}} cs-icon-lg"></i>
                  </div>
                  <div>
                    <h3 class="mb-3 font-heading text-xl font-medium text-dark dark:text-white sm:text-2xl md:mb-5"> {{__($menu_item['template_name'])}} </h3>
                    <p class="text-base text-dark-text">{{__($menu_item['template_description'])}}</p>
                  </div>
                </div>
              </div>
          @endforeach
        @endforeach
      </div>
    </div>
  </section>
  <!-- ===== Features Section End ===== -->


  <!-- ===== About Section Start ===== -->
  <?php
    $use_cases = [
      ['title'=>__("Digital Marketers"),'description'=>__("Our platform generates custom-tailored content, enabling marketers to create engaging campaigns quickly. With AI-powered insights, they refine strategies and connect with their target audience effectively.")],
      ['title'=>__("E-commerce Brands"),'description'=>__("By automating product description generation, we assist e-commerce brands in creating persuasive listings rapidly. This boosts product visibility and entices potential customers, ultimately driving sales.")],
      ['title'=>__("Bloggers & Influencers"),'description'=>__("Our tool simplifies content creation, helping bloggers and influencers produce high-quality posts effortlessly. With AI-generated ideas and drafts, they maintain consistency and engage their audience consistently.")],
      ['title'=>__("SEO Experts"),'description'=>__("We aid SEO experts in creating keyword-rich content at scale, improving their clients' search engine rankings and online visibility. Our platform streamlines content production, saving time and resources.")],
      ['title'=>__("Social Media Managers"),'description'=>__("With our platform, social media managers craft captivating captions and posts efficiently. By leveraging AI insights, they optimize content for each platform and enhance engagement with their audience.")],
      ['title'=>__("Social Media Managers"),'description'=>__("Social media managers can content generation tools to generate captions and social media posts that resonate with their audience. These tools can help managers save time and ensure that their social media channels are consistently active and engaging.")],
      ['title'=>__("Small Businesses"),'description'=>__("Our platform empowers small businesses to create professional content without the need for a dedicated team. By automating content generation, they save valuable time and resources while maintaining a competitive edge.")],
      ['title'=>__("Content Creators"),'description'=>__("We fuel creativity for content creators by providing AI-generated ideas and drafts. Our platform assists them in overcoming writer's block and inspires fresh, engaging content across various mediums.")],
      ['title'=>__("Educators & Trainers"),'description'=>__("We streamline content creation for educators and trainers, allowing them to develop course materials and resources efficiently. With AI-generated content, they enhance learning experiences and engage students effectively.")],
      ['title'=>__("Journalists & Writers"),'description'=>__("Our platform accelerates the research and drafting process for journalists and writers. By providing AI-generated insights and drafts, we facilitate the creation of high-quality articles and reports, saving time and effort.")],
    ];
  ?>
  <section id="about" class="pt-14 sm:pt-20 lg:pt-[130px]">
    <div class="px-4 xl:container-fluid">
      <!-- Section Title -->
      <div class="relative mx-auto mb-12 pt-6 text-center lg:mb-20 lg:pt-16" data-wow-delay=".2s">
        <span class="title"> {{__("Use Cases")}} </span>
        <h2 class="mx-auto mb-5 max-w-[570px] font-heading text-3xl font-semibold text-dark dark:text-white sm:text-4xl md:text-[50px] md:leading-[60px]"> {{__("Try :appname’s Powerful Tools",["appname"=>config('app.name')])}} </h2>
        <p class="mx-auto max-w-[570px] text-base text-dark-text"> {{__("Unlock Your Creative Potential with AcrDigital Media: Where Imagination Meets Innovation, Crafting Your Success Story One Byte at a Time")}} </p>
      </div>

      <div class="relative z-10 overflow-hidden rounded px-8 pt-0 pb-8 md:px-[70px] md:pb-[70px] lg:px-[60px] lg:pb-[60px] xl:px-[70px] xl:pb-[70px]" data-wow-delay=".3s">
        <div class="absolute top-0 left-0 -z-10 h-full w-full bg-cover bg-center opacity-10 dark:opacity-40 bg-noise-pattern"></div>

        <div class="px-4 xl:container">
          <div class="-mx-4 flex flex-wrap justify-center items-center">
            @foreach($use_cases as $use_case)
            <div class="w-full px-3 lg:w-1/3">
              <div class="mx-auto mb-12 max-w-[530px] text-center lg:ml-1 lg:mb-0 lg:text-left">
                <h1 class="cs-use-case-heading mb-5 font-heading text-2xl font-semibold dark:text-white sm:text-4xl md:text-[500px] md:leading-[60px]" data-wow-delay=".3s"> {{$use_case['title']}}</h1>
                <p class="mb-12 text-base text-dark-text" data-wow-delay=".4s"> {{$use_case['description']}}</p>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ===== About Section End ===== -->
  <!-- ===== FAQ Section Start ===== -->
  <script>
      document.addEventListener('click', function (e) {
  if (e.target.tagName === 'SUMMARY') {
    let openDetails = document.querySelector('details[open]');
    if (openDetails && openDetails !== e.target.parentNode) {
      openDetails.removeAttribute('open');
    }
  }
});

  </script>
  <section id="faq" class="pt-14 sm:pt-20 lg:pt-[130px]">
      <h1 style="font-size: 1.875rem; line-height: 2.25rem; text-align: center; font-weight: 600; margin-bottom: 1.5rem;">Frequently Asked Questions</h1>
    <div style="max-width: 1280px; margin: 0 auto; padding: 1.5rem; display:flex;">
        <div>
            <img src="{{ asset('/assets/images/dashboard/faq.png') }}" alt="faq" style="width:300px; max-width:300px; height:auto border-radius:0.8rem">
        </div>
    <div style="flex:1; margin: 0 0; padding: 1.5rem;">
    

        <details style="margin-bottom: 1rem;">
            <summary style="font-size: 1.5rem; line-height: 1.75rem; cursor: pointer; display: flex; align-items: flex-start;">
        1. What types of content can AcrDigital Media create? <span style="margin-left: auto;">+</span>
            </summary>
            <div style="padding: 1rem; background-color: #f4f5f7; border-radius: 0.8rem;">
                <p>AcrDigital Media can generate a wide range of content, including articles, blog posts, product descriptions, social media posts, and more. Whatever your content needs are, our AI-powered platform can deliver.</p>
            </div>
        </details>

        <details style="margin-bottom: 1rem;">
        <summary style="font-size: 1.5rem; line-height: 1.75rem; cursor: pointer; display: flex; align-items: flex-start; ">
        2. Is the content generated by AcrDigital Media unique? <span style="margin-left: auto;">+</span>
        </summary>
        <div style="padding: 1rem; background-color: #1f2937; color: white; border-radius: 0.8rem;">
            <p>Yes, absolutely. AcrDigital Media creates original content tailored to your specifications. Our AI algorithms ensure that each piece of content is unique, engaging, and plagiarism-free, providing you with high-quality material for your audience.</p>
        </div>
        </details>

        <details style="margin-bottom: 1rem;">
        <summary style="font-size: 1.5rem; line-height: 1.75rem; cursor: pointer; display: flex; align-items: flex-start;">
        3. Can I customize the content generated by AcrDigital Media? <span style="margin-left: auto;">+</span>
        </summary>
        <div style="padding: 1rem; background-color: #f4f5f7; border-radius: 0.8rem;">
            <p>Of course! We offer customization options to align the generated content with your brand voice, style preferences, and specific requirements. You can provide guidelines, keywords, and feedback to tailor the content to your liking.
</p>
        </div>
        </details>
        <details style="margin-bottom: 1rem;">
        <summary style="font-size: 1.5rem; line-height: 1.75rem; cursor: pointer; display: flex; align-items: flex-start;">
        4. How accurate is the content generated? <span style="margin-left: auto;">+</span>
        </summary>
        <div style="padding: 1rem; background-color: #1f2937; color: white; border-radius: 0.8rem;">
            <p>We are built on state-of-the-art AI technology, resulting in highly accurate and relevant content generation. Our platform continuously learns and improves, ensuring that the content it produces meets the highest standards of quality and accuracy.</p>
        </div>
        </details>
        <details style="margin-bottom: 1rem;">
        <summary style="font-size: 1.5rem; line-height: 1.75rem; cursor: pointer; display: flex; align-items: flex-start;">
        5. What industries can benefit from AcrDigital Media? <span style="margin-left: auto;">+</span>
        </summary>
        <div style="padding: 1rem; background-color: #f4f5f7; border-radius: 0.8rem;">
            <p>AcrDigital Media is versatile and can cater to various industries, including but not limited to marketing, e-commerce, finance, technology, healthcare, and education. Whatever your industry or niche, our platform can help streamline your content creation process.</p>
        </div>
        </details>
        <details style="margin-bottom: 1rem;">
        <summary style="font-size: 1.5rem; line-height: 1.75rem; cursor: pointer; display: flex; align-items: flex-start;">
        6. Is AcrDigital Media suitable for businesses of all sizes? <span style="margin-left: auto;">+</span>
        </summary>
        <div style="padding: 1rem; background-color: #1f2937; color: white; border-radius: 0.8rem;">
            <p>Absolutely. Whether you're a small startup, a medium-sized enterprise, or a large corporation, we can benefit your business by providing efficient, cost-effective content generation solutions tailored to your scale and needs.</p>
        </div>
        </details>
  </div>
  </div>
</section>
  <!-- ===== FAQ Section End ===== -->

  <!-- ===== CTA Section Start ===== -->
  <section id="cta" class="pt-14 sm:pt-20 lg:pt-[130px]">
    <div class="px-4 xl:container">
      <div class="relative overflow-hidden bg-cover bg-center py-[60px] px-10 drop-shadow-light dark:drop-shadow-none sm:px-[70px]" data-wow-delay=".2s">
        <div class="absolute top-0 left-0 -z-10 h-full w-full bg-cover bg-center opacity-10 dark:opacity-40 bg-noise-pattern"></div>
        <div class="absolute bottom-0 left-1/2 -z-10 -translate-x-1/2">
          <svg width="1215" height="259" viewBox="0 0 1215 259" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g opacity="0.6" filter="url(#filter0_f_63_363)">
              <rect x="450" y="189" width="315" height="378" fill="url(#paint0_linear_63_363)" />
            </g>
            <defs>
              <filter id="filter0_f_63_363" x="0" y="-261" width="1215" height="1278" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                <feFlood flood-opacity="0" result="BackgroundImageFix" />
                <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
                <feGaussianBlur stdDeviation="225" result="effect1_foregroundBlur_63_363" />
              </filter>
              <linearGradient id="paint0_linear_63_363" x1="420.718" y1="263.543" x2="585.338" y2="628.947" gradientUnits="userSpaceOnUse">
                <stop stop-color="#ABBCFF" />
                <stop offset="0.859375" stop-color="#4A6CF7" />
              </linearGradient>
            </defs>
          </svg>
        </div>
        <div class="-mx-4 flex flex-wrap items-center">
          <div class="w-full px-4 lg:w-2/3">
            <div class="mx-auto mb-10 max-w-[750px] text-center lg:ml-0 lg:mb-0 lg:text-left">
              <h2 class="mb-4 font-heading text-l font-semibold leading-tight text-dark dark:text-white sm:text-[38px]" style="font-size:35px;"> {{__("Transform Your Content Strategy Today! ")}} </h2>
              <p class="text-base text-dark-text"> {{__("Unlock the Power of AI with AcrDigital Media. ")}} </p>
            </div>
          </div>
          <div class="w-full px-4 lg:w-1/3">
            <div class="text-center lg:text-right">
              <a href="{{route("register")}}" class="inline-flex items-center rounded bg-primary py-[14px] px-8 font-heading text-base text-white hover:bg-opacity-90"> {{__("Get Started Now!")}} </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ===== CTA Section End ===== -->

  <!-- ===== Testimonial Section Start ===== -->
  @include('landing.partials.testimonial')
  <!-- ===== Testimonial Section End ===== -->

@endsection

@push('script-footer')
  <script src="{{asset('/assets/landing/main.js')}}"></script>
@endpush
