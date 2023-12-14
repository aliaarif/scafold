// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  devtools: { enabled: false },
  css: ["~/assets/css/main.css", "~/assets/css/skeleton.css", 'animate.css/animate.min.css'],
  modules: ["@pinia/nuxt", "@pinia-plugin-persistedstate/nuxt", "nuxt3-leaflet", "nuxt-vue3-google-signin", "nuxt-simple-sitemap", "@nuxtseo/module"],


  site: {
    hostname: 'https://www.easetrail.com',
    // url: 'https://example.com',
    name: 'Easetrail',
    description: 'Welcome to my awesome site!',
    defaultLocale: 'en',
  },
  sitemap: {
    sitemaps: {
      etpage: {
        urls() {
          // resolved when the sitemap is shown
          return ['/', '/about', '/contact', '/terms', '/privacy', '/login']
        },
      },
      etcities: {
        sources: [
          '/api/__sitemap__/cities'
        ]
      },
      etcat: {
        sources: [
          '/api/__sitemap__/categories'
        ]
      },
      etsubcatbl: {
        sources: [
          '/api/__sitemap__/subcategories'
        ]
      },
      etb: {
        sources: [
          '/api/__sitemap__/businesses'
        ]
      },
    },
  },
  plugins: [],
  googleSignIn: {
    clientId: '661329983036-oc2q7gjc12ekg9qnkgid9g9oiakt0abi.apps.googleusercontent.com'
  },
  runtimeConfig: {
    // indexable: false,
    googleClientId: '661329983036-oc2q7gjc12ekg9qnkgid9g9oiakt0abi.apps.googleusercontent.com',
    dburl: process.env.DAATABASE_URL,
    dbName: process.env.DBNAME,
    user: process.env.DBUSERNAME,
    pass: process.env.DBPASSWORD,
    authSource: process.env.DBAUTHSOURCE,
  },
  imports: {
    dirs: ["composables/**"],
  },
  // publicDir: 'public',
  app: {
    // pageTransition:{name:'page', mode:'out-in'},
    // layoutTransition:{name:'page', mode:'in-out'},
    head: {
      charset: "utf-16",

      // viewport: "width=500, initial-scale=1",

      title: "Easetrail - Write your title here for Home Page",
      meta: [
        {
          name: "viewport",
          content: "width=device-width, initial-scale=1",
        },
        {
          name: "description",
          content: "Easetrail - Your go-to destination for daily needs. Find a wide range of services from beauty and wellness to home repairs, travel & accommodations, and educational institutions.",
        },
        {
          name: "google-site-verification",
          content: "8ZWS3hipRRw3Iw5vGwozy2AHrRW4-LtewEykNysmOKM",
        },
      ],
      link: [
        {
          rel: 'stylesheet',
          href: 'https://cdn.quilljs.com/1.3.6/quill.snow.css',
        },
        {
          rel: 'stylesheet',
          href: 'https://unpkg.com/leaflet@1.6.0/dist/leaflet.css',
        },
      ],
      script: [
        { src: 'https://cdn.quilljs.com/1.3.6/quill.js' }
      ],
    },
  },
  ssr: true,
});
