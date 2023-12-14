import React from 'react';

// import data
import { technologies } from '../data'

const Technologies = () => {
  return <section className='section' id='technologies'>
    <div className="mx-auto">
      <h2 className='section-title'>{technologies.title}
        <san className="dot"></san>
      </h2>
      <p className='section-subtitle'>{technologies.subtitle}</p>
      {/* technologies items */}
      <div className="items-center gap-y-12 lg:flex-row lg:justify-between lg:px-[136px] grid grid-cols-4 gap-2">
        {technologies.skills.map((service, index) => {
          return <div className='p-[30px] w-full max-w-[417px] lg:text-left flex flex-col text-center hover:bg-white hover:shadow-2xl cursor-crosshair transition-all'>
            {/* icon */}
            <div className="w-20 h-20 mb-12 mx-auto lg:mx-0">
              <img src={service.icon} alt="My technologies" />
            </div>
            {/* technologies name */}
            <h3 className='text-2xl mb-3 font-semibold'>{service.name}</h3>
            {/* service description */}
            <p className='text-grey text-lg lg:mb-16'>{service.description}</p>
          </div>
        })}
      </div>
    </div>
  </section>;
};

export default Technologies;
