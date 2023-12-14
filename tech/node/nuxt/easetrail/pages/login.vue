<script setup>
import { useAuthStore } from "@/stores/auth";
import { useAuthDataStore } from "@/stores/auth-data";



import { useForm, useField } from 'vee-validate';
import * as yup from 'yup';


const authStore = useAuthStore();
const authDataStore = useAuthDataStore();
const { title, module, auth, setAuth, dynamicTitle } = useCommon();

import { GoogleSignInButton } from 'vue3-google-signin';

let user;
// handle success event
const handleLoginSuccess = async (response) => {
  const { credential } = response;
  if (credential) {
    user = await $fetch("/api/google-login", {
      method: "POST",
      body: {
        token: credential,
      },
    });
  }
  // console.log(user)
  //   setAuth(user);
  //   localStorage.auth = JSON.stringify(user);

  authStore.setAuthenticated(true);
  authDataStore.setAuthData(user);
  navigateTo("/dashboard");
};

// handle an error event
const handleLoginError = async () => {
  console.error("Login failed");
};

useHead({
  title: `Easetrail Login`,
  meta: [{ name: "Login to Easetrail and list your business online for free.", content: "Welcome back! Please enter your credentials to access your account." }],
});

// onMounted(() => {
//   if (authStore.isAuthenticated) {
//     navigateTo("/dashboard");
//   }
// });



// Validation Schema
const schema = yup.object({
  email: yup.string().required().email(),
  password: yup.string().required(),
});

// Reactive form state
const form = ref({
  email: '',
  password: ''
});
const logo = ref(null);

// VeeValidate setup
const { handleSubmit, errors } = useForm({
  validationSchema: schema,
});

// Handle file upload
const handleFileUpload = (event) => {
  logo.value = event.target.files[0];
};

// Form submission logic
const onSubmit = async () => {
  const formData = new FormData();
  formData.append('email', form.value.email);
  formData.append('password', form.value.password);
  formData.append('logo', logo.value);

  // Here, you can use formData to send data to your server
  // Example: await axios.post('your-api-endpoint', formData);

  console.log('Form submitted');
};


</script>

<template>
  <section class="form">
    <div class="forms-body">
      <div class="container">
        <div class="columns is-centered mt-6">
          <div class="column form-box is-3-tablet is-3-desktop is-3-widescreen box has-text-centered mt-6 mb-4">
            <h1 class="is-size-5 mb-4">Easetrail Login</h1>
            <GoogleSignInButton class="mt-1 mb-4" @success="handleLoginSuccess" @error="handleLoginError">
            </GoogleSignInButton>
            <br />
            Or
            <hr />
            <!-- <p class="control">
              <input v-model="city" class="input is-primary is-small" type="text" placeholder="Email"
                autocomplete="off" />
            </p> -->


            <form @submit.prevent="handleSubmit(onSubmit)">
              <!-- Email Field -->
              <div class="field">
                <div class="control">
                  <input class="input is-primary is-small" type="email" placeholder="Email" v-model="form.email">
                  <span class="help is-danger is-pulled-left" v-if="errors.email">{{ errors.email }}</span>
                </div>
              </div>

              <!-- Password Field -->
              <div class="field mt-4">
                <div class="control">
                  <input class="input is-primary is-small" type="password" placeholder="Password" v-model="form.password">
                  <span class="help is-danger is-pulled-left" v-if="errors.password">{{ errors.password }}</span>
                </div>
              </div>

              <!-- Submit Button -->
              <div class="control mt-2">
                <button class="button is-primary">Submit</button>
              </div>
            </form>

            <p> By signing up, you agree to our <a href="https://easetrail.com/terms">Terms of Use </a> and <a
                href="https://easetrail.com/privacy">Privacy Policy </a> </p>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<style scoped>
@media screen and (max-width: 768px) {

  .columns {
    margin: 0px;
  }

  .form-box {
    padding: 50px;
    margin-right: 20px;
  }
}

.form-box {
  padding: 2.5rem;
  border: 1px solid #dadce0;
  -webkit-border-radius: 8px;
  border-radius: 8px;
}



@media screen and (min-width: 769px) {
  .column.is-3-tablet {
    width: 30%;
  }
}
</style>