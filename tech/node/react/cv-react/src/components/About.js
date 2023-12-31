import React from 'react';

// import data
import { about } from '../data'

// import images
import Me from '../assets/img/me_about.png'

const About = () => {
  return <section className='section relative lg:before:content-pattern lg:before:absolute lg:before:top-[332px] lg:before:left-[180px] lg:after:content-rope lg:after:absolute lg:after:overflow-hidden lg:after:left-0 lg:after:right-0 lg:after:top-[70%] lg:after:fle lg:after:justify-center lg:after:items-center ' id='about'>
    <div className="container mx-auto">
      <h2 className='section-title'>{about.title}
        <span className="dot"></span>
      </h2>
      <p className='section-subtitle lg:mb-[60px] justify-start'>{about.subtitle}</p>
      <p className='section-subtitle lg:mb-[60px]'>{about.p1}</p>
      <p className='section-subtitle lg:mb-[60px]'>{about.p2}</p>
      <p className='section-subtitle lg:mb-[60px]'>{about.p3}</p>
      <p className='section-subtitle lg:mb-[60px]'>{about.p4}</p>
      <p className='section-subtitle lg:mb-[60px]'>{about.p5}</p>

      {/* Image */}
      <div>
        {/* circle */}
        <div className='absolute w-32 h-32 bg-accent left-[38%] top-[42%] md:left-[50%] md:top-[35%] z-30 rounded-full mix-blend-hue blur-[30px]'></div>
        <img className='mx-auto z-20 relative' src={Me} alt="Me" />
      </div>

    </div>
  </section>;
};

export default About;
