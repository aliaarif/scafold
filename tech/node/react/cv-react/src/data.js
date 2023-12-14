// remix icons
import {
  RiGoogleFill,
  RiYoutubeFill,
  RiInstagramFill,
  RiGithubFill,
  RiLinkedinFill,
} from 'react-icons/ri';



// services icons
import Service1Icon from './assets/img/services/uiux_design.svg';
// import Service2Icon from './assets/img/services/web_design.svg';
// import Service3Icon from './assets/img/services/development.svg';

// brands images
import Brand1Image from './assets/img/brands/Foetron_New-Logo.png';
import Brand2Image from './assets/img/brands/google.svg';
import Brand3Image from './assets/img/brands/dribbble.svg';
import Brand4Image from './assets/img/brands/uplabs.svg';
import Brand5Image from './assets/img/brands/99designs.svg';

// portfolio images
import PortfolioImage1 from './assets/img/portfolio/p3.png';
import PortfolioImage2 from './assets/img/portfolio/p2.png';
import PortfolioImage3 from './assets/img/portfolio/p1.png';
import PortfolioImage4 from './assets/img/portfolio/p4.jpg';
import PortfolioImage5 from './assets/img/portfolio/p5.jpg';

// nav
export const nav = [
  {
    name: 'home',
  },
  {
    name: 'about',
  },
  {
    name: 'services',
  },
  {
    name: 'contributors',
  },
  {
    name: 'portfolio',
  },
  {
    name: 'contact',
  },
];

// social
export const social = [
  {
    icon: <RiYoutubeFill />,
    href: '',
  },
  {
    icon: <RiInstagramFill />,
    href: '',
  },
  {
    icon: <RiGithubFill />,
    href: '',
  },
  {
    icon: <RiLinkedinFill />,
    href: '',
  },
  {
    icon: <RiGoogleFill />,
    href: '',
  },
];

// about
export const about = {
  title: 'About me',
  subtitle: 'A Web Application Developer',
  p1: `Hello, I'm Mohammed Aarif, a Software Engineer specializing in Web Application Development. My technical proficiency spans a broad spectrum of backend technologies, including Laravel (PHP), Express.js and Adonis.js (Node.js), as well as FastAPI (Python). In addition, I'm skilled in front-end frameworks like Vue.js, React.js, and their server-side counterparts, Nuxt.js and Next.js.`,

  // p2: `My expertise doesn't just stop at development. I possess immense knowledge in cloud computing with AWS, as well as in containerization with Docker, which empowers me to efficiently manage and deploy robust applications. This combination of development and operational skills ensures that I can handle the full lifecycle of complex web applications with ease and precision.`,

  // p3: `When I'm not coding, you can find me traveling or lost in the world of music. Traveling is more than a hobby for me; it's a way to connect with different cultures and gain fresh perspectives that enrich my personal and professional life.Music, on the other hand, is my sanctuary, offering relaxation and a source of creative inspiration.`,

  p4: `I am passionate about leveraging my diverse skill set to develop impactful and efficient web solutions.I thrive on challenges and am always eager to collaborate on projects that push the boundaries of what's possible in web development.`,

  p5: `Let's connect and explore the possibilities of what we can build together!`,
  image: '',
};

// technologies
export const technologies = {
  title: 'My Skills (Technologies)',
  subtitle:
    `I have the immense knowledge in the below listed technologies for build the web applications or RestFull APIs`,
  skills: [
    {
      icon: Service1Icon,
      name: 'HTML',
      description: `HyperText Markup Language is the standard language for creating and designing documents on the World Wide Web. It defines the structure of web pages using markup. HTML elements are the building blocks of HTML pages and are represented by tags like <html>, <head>, <body>, <title>, <h1>, <p>, <article>, <section>, <nav>, <header>, and <footer>, etc.`
    },
    {
      icon: Service1Icon,
      name: 'CSS',
      description:
        `Cascading Style Sheets is a stylesheet language used to describe the presentation of a document written in HTML or XML. CSS describes how elements should be rendered on screen, on paper, in speech, or on other media. It's used to control the layout of multiple web pages all at once.`,
    },
    {
      icon: Service1Icon,
      name: 'JavaScript',
      description:
        `JavaScript is a high-level, interpreted programming language that is one of the core technologies of the World Wide Web, alongside HTML and CSS. Originally designed for creating dynamic web pages, JavaScript has evolved into a versatile and powerful language used for both client-side and server-side applications.`,
    },
    {
      icon: Service1Icon,
      name: 'jQuery',
      description:
        `jQuery is a widely-used JavaScript library designed to simplify HTML DOM tree traversal and manipulation, as well as event handling, CSS animation, and Ajax. It's free, open-source software using the permissive MIT License. Developed by John Resig in 2006, jQuery's motto is "write less, do more, " reflecting its purpose of making it much easier to use JavaScript on your website.`,
    },
    {
      icon: Service1Icon,
      name: 'Vue.js',
      description:
        `Vue.js is an open - source JavaScript framework for building user interfaces and single- page applications.Created by Evan You in 2014, Vue is designed to be incrementally adoptable.Its core library focuses on the view layer only, making it easy to integrate with other libraries or existing projects.Vue is also capable of powering sophisticated Single - Page Applications(SPAs) when used in combination with modern tooling and supporting libraries`,
    },
    {
      icon: Service1Icon,
      name: 'React.js',
      description:
        `React.js, commonly referred to as React, is an open-source JavaScript library for building user interfaces, especially for single-page applications. It's maintained by Facebook and a community of individual developers and companies. React was created by Jordan Walke and was first deployed on Facebook's newsfeed in 2011.`,
    },
    {
      icon: Service1Icon,
      name: 'Nuxt.js',
      description:
        `Nuxt.js is an open-source framework based on Vue.js, Node.js, Webpack, and Babel.js. It simplifies the development of universal or single-page Vue.js applications. Created to abstract common tasks of web development, Nuxt.js provides a higher-level framework that builds on Vue.js, offering a powerful and flexible way to build modern web applications.`,
    },
    {
      icon: Service1Icon,
      name: 'Next.js',
      description:
        `Next.js is an open-source React framework that enables functionality such as server-side rendering and generating static websites for React-based web applications. Developed by Vercel (formerly Zeit), it aims to simplify the process of building server-rendered or statically generated React applications.`,
    },
    {
      icon: Service1Icon,
      name: 'Express.js',
      description:
        `Express.js, often referred to as Express, is a minimal and flexible Node.js web application framework that provides a robust set of features for web and mobile applications. It's one of the most popular frameworks for building web applications and RESTful APIs in Node.js due to its simplicity, flexibility, and scalability.`,
    },
    {
      icon: Service1Icon,
      name: 'Adonis.js',
      description:
        `Adonis.js is a Node.js web framework that offers a stable eco-system to write server-side web applications. It is often compared to Laravel, a PHP framework, due to its similar design principles and features. Adonis.js aims to provide a more robust and developer-friendly environment with its focus on ergonomics and stability.`,
    },
    {
      icon: Service1Icon,
      name: 'FastAPI',
      description:
        `FastAPI is a modern, fast (high-performance), web framework for building APIs with Python 3.7+ based on standard Python type hints. Created by Sebastián Ramírez, it has gained popularity for its speed, ease of use, and scalability.`,
    },
    {
      icon: Service1Icon,
      name: 'Laravel',
      description:
        `Laravel is a free, open-source PHP web framework created by Taylor Otwell in 2011 and is intended for the development of web applications following the model-view-controller (MVC) architectural pattern. It's known for its elegant syntax and is one of the most popular PHP frameworks.`,
    },
  ],
};

// contributors
export const contributors = {
  title: 'Contributors',
  subtitle:
    'They support products that simplify and automate decent mechanic processes saving time for activities.',
  brands: [
    {
      image: Brand1Image,
    },
    {
      image: Brand2Image,
    },
    {
      image: Brand3Image,
    },
    {
      image: Brand4Image,
    },
    {
      image: Brand5Image,
    },
  ],
};

// portfolio
export const portfolio = {
  preTitle: 'Our Regular Updated',
  title: 'Portfolio.',
  image1: PortfolioImage1,
  image2: PortfolioImage2,
  image3: PortfolioImage3,
  image4: PortfolioImage4,
  image5: PortfolioImage5,
};

// contact
export const contact = {
  title: 'Contact.',
  subtitle:
    'Truth is a deep kindness that teaches us to be content in our everyday life and share with the people the same happiness. the feeling of sunday is the same everywhere: heavy, melancholy, standing still..',
  email1: 'ali.aliaarif@gmail.com',
  email2: 'aarif.theoneandonly@gmail.com',
  phone1: '8005794205',
  phone2: '8078649127',
  address: '17/86, Opposite to Zakir Kirana Store. Purana Falsha, Sadulpur - 331023, Rajasthan (INDIA)'
};
