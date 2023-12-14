import React from 'react';

//import data
import { social } from '../data';

const Social = () => {
  return <section className='section mx-auto  flex justify-between max-w-[250px] -mt-24' id='social'>
    {social.map((item, index) => {
      return (<a className=' text-3x1 hover:text-accent duration-300 transition-all' href={item.href} key={index}>{item.icon}</a>);
    })}
  </section>;
};

export default Social;
