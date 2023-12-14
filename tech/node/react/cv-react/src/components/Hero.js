import React from 'react';

// import components
import Social from './Social'

// import images
import Me from '../assets/img/me_banner.png'

// import icons
import { RiFileDownloadFill } from 'react-icons/ri'

const Hero = () => {
  return <section className='section pt-[100px] bg-heroText bg-contain bg-no-repeat bg-center lg:bg-top' id='home'>
    <div className="container mx-auto xl:px-[100px]">
      <div className="lg:flex text-center lg:text-left gap-10 mb-[35px]">
        {/* hero left side  */}
        <div className="flex-1 lg:max-w-[558px] mt-2">
          <h3 className='text-[18px] lg-text-xl font-semibold lg:mb-[20px]'>Helo! I'm</h3>
          <h2 className='text-[24px] lg:text-[32px] font-semibold text-accent lg:mb-5'>Aarif</h2>
          <h1 className='text-[60px] md:text-[80px] lg:text-[100px] leading-none font-semibold mb-6'>Software <br />
            <span className='lg:pl-[70px]'>Engineer</span>
            <span className="w3 h3 md:w-5 md:h-5 inline-block bg-accent rounded-full ml-2"></span>
          </h1>
          <p className='mb-[35px] text-lg lg:text-xl text-center lg:text-center font-semibold text-accent'>( Web Application Developer )</p>
          {/* socials */}
          <div className='mx-auto mx-w-min -mt-24 relative z-10'>
            <Social />
          </div>
          <button className='btn bg-accent mx-auto mt-12  shadow-x1 shadow-[#b34848] relative z-10'>Download my CV
            <span className="text-xl ml-3"><RiFileDownloadFill /></span>
          </button>
        </div>
        {/* hero right side  */}
        <div className="flex-1 flex justify-center lg:justify-end relative lg:after:content-arrow xl-after-w-96 xl:after:h-96 xl:after:block xl:after:absolute xl:after:top-2/4 xl:after:-left-96 ">
          <img className='z-20' src={Me} alt='My Banner' />
          <div className="w-[350px] h-[400px] sm:w-[553] sm:h-[753px]  bg-blob bg-contain bg-no-repeat mx-auto absolute top-[85px] z-10"></div>
        </div>
      </div>
    </div>
  </section>;
};

export default Hero;
