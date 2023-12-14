<script setup>
const { slug, title, module, edit, item, subcategories, profileTab, setModule, setAction, setEdit, setItem } = useCommon()
import { useAuthStore } from "@/stores/auth";
import { useAuthDataStore } from "@/stores/auth-data";
import { useDropdownStore } from "@/stores/dropdown";
import { useItemStore } from "@/stores/item";
const dropdownStore = useDropdownStore();
const itemStore = useItemStore();
const authStore = useAuthStore();
const authDataStore = useAuthDataStore();
const cnt = ref(1)
const showFilesNo = ref('')
const selectedFiles = ref([])
const universalErrors = ref(true)

const makeSlug = (mod, edit = false) => {
    if (mod == 'cities') {
        cityFormData.value.slug  = dropdownStore.dropdown.city
        if (edit) {  item.value.slug = slug(dropdownStore.dropdown.city)  } else { cityFormData.value.slug = slug(dropdownStore.dropdown.city) }
    }
    if (mod == 'localities') {
        localityFormData.value.slug  = dropdownStore.dropdown.locality
        if (edit) {  item.value.slug = slug(dropdownStore.dropdown.locality)  } else { localityFormData.value.slug = slug(dropdownStore.dropdown.locality) }
    }
    if (mod == 'categories') {
        if (edit) {  item.value.slug = slug(item.value.name)  } else { categoryFormData.value.slug = slug(categoryFormData.value.name) }
    }
    if (mod == 'subcategories') {
        if (edit) {  item.value.slug = slug(item.value.name)  } else { subCategoryFormData.value.slug = slug(subCategoryFormData.value.name) }
    }
    if (mod == 'services') {
        if (edit) {  item.value.slug = slug(item.value.name)  } else { serviceFormData.value.slug = slug(serviceFormData.value.name) }
    }
    if (mod == 'keywords') {
        if (edit) {  item.value.slug = slug(item.value.name)  } else { keywordFormData.value.slug = slug(keywordFormData.value.name) }
    }
    if (mod == 'businesses') {
        if (edit) {  item.value.business_slug = slug(item.value.business_name)  } else { businessFormData.value.business_slug = slug(businessFormData.value.business_name) }
    }
}


// const business_name = ref("")
const businessFormData = ref({
    business_name: '',
    business_slug: '',
    business_ownership: '',
    business_category: '',
    business_services: [],
    business_timing:
    {
        monday: {
            start: "09:00",
            end: "17:00"
        },

        tuesday: {
            start: "09:00",
            end: "17:00"
        },

        wednesday: {
            start: "09:00",
            end: "17:00"
        },

        thrusday: {
            start: "09:00",
            end: "17:00"
        },

        friday: {
            start: "09:00",
            end: "17:00"
        },

        saturday: {
            start: "",
            end: ""
        },

        sunday: {
            start: "",
            end: ""
        }
    },
    business_address: '',
    business_locality: '',
    business_city: '',
    business_state: '',
    business_pin: '',
    business_phone: '',
    business_email: '',
    business_website: '',
    business_social: {
        facebook: 'https://facebook.com/',
        instagram: 'https://instagram.com/',
        youtube: 'https://youtube.com/'
    },
    business_latitude: '',
    business_longitude: '',
    business_description: '',
    business_faqs: [
        {
            q: "",
            a: ""
        },
        {
            q: "",
            a: ""
        },
        {
            q: "",
            a: ""
        }
    ],
    // images: [],
    business_images: [],
    status: 'Pending',
    created_by: authDataStore.authData.value?.email,
    updated_by: authDataStore.authData.value?.email
})
const businessErrors = ref({
    business_name: false,
    business_slug: false,
    business_category: false,
    business_address: false,
    business_city: false,
    business_state: false
})
const fileInput = ref(null)

const onFileChangeAdd = async (event) => {
    selectedFiles.value.business_images = Array.from(event.target.files)
    showFilesNo.value = selectedFiles.value.business_images.length + ' Files Selected'
    selectedFiles.value.business_images.forEach(file => {
        const imageUrl = URL.createObjectURL(imageUrl)
        businessFormData.value.business_images.push(imageUrl)
        // URL.revokeObjectURL(imageUrl)         
    });
}


const handleFiles = () => {
  const files = fileInput.value.files
  const promises = []
  
  for (let i = 0; i < files.length; i++) {
    promises.push(readFileAsBase64(files[i]))
  }
  
  Promise.all(promises).then(images => {
    businessFormData.value.business_images = images
    // businessFormData.value.business_name = business_name.value
  })
}


const readFileAsBase64 = (file) => {
  return new Promise((resolve, reject) => {
    const reader = new FileReader()
    reader.onloadend = () => {
      const base64String = reader.result.split(',')[1]
      resolve(base64String)
    }
    reader.onerror = reject
    reader.readAsDataURL(file)
  })
}

const removeImageFromBusinessAdd = (image) => {
    businessFormData.value.business_images.pop(image)
    showFilesNo.value = (businessFormData.value.business_images.length > 0) ? businessFormData.value.business_images.length + ' Files Selected' : ''
}


const addBusiness = () => {
    console.log(businessFormData)
  // Handle axios or fetch call here to upload data
  // Note: Make sure axios is added to your project if you use it
}


const businessErrors = ref({
    business_name: false,
    business_slug: false,
    business_images: false
})
const businessErrorsCheck = () => {
    if (!businessErrors.value.business_name && !businessErrors.value.business_slug && !businessErrors.value.business_images) { universalErrors.value = false } else { universalErrors.value = true }
}
const addBusiness = async () => {
    businessErrors.value.business_name = !businessFormData.value.business_name ? true : false
    businessErrors.value.business_slug = !businessFormData.value.business_slug ? true : false
    businessErrors.value.business_images = !businessFormData.value.business_imagess  ? true : false
    businessErrorsCheck()
    useFetch("/api/save/state", { method: 'post', body: businessFormData, watch:false}).then((res) => {
        !universalErrors.value ? successMessage(res) : errorMessage('Please fill the required fields')
        if (!universalErrors.value) { businessFormData.value.name = '' } else { universalErrors.value  = true }
    })
}


</script>

<template>

            <!-- Add Business -->
            <section v-if="module == 'businesses' && !item">
                <!-- {{businessFormData}} -->
                <form @submit.prevent="addBusiness">
                    <div class="columns">
                        <div class="column">
                            <div class="field">
                                <label class="label is-size-7">Business Name</label>
                                <div class="control">
                                    <input type="text" class="input is-small" 
                                    :class="{'dirty': businessErrors.business_name}" 
                                    v-model="businessFormData.business_name"  
                                    placeholder="Enter Business Name" 
                                    @input="makeSlug('businesses')">
                                </div>
                            </div>
                        </div>
                        <div class="column">
                            <div class="field">
                                <label class="label is-size-7">Business Slug</label>
                                <div class="control">
                                    <input type="text" class="input is-small" 
                                    :class="{'dirty': businessErrors.business_slug}" 
                                    v-model="businessFormData.business_slug"  
                                    placeholder="Enter Business Slug" 
                                    >
                                </div>
                            </div>
                        </div>
                    </div>

                    
                            <div class="file is-small has-name is-fullwidth">
                                <label class="file-label">
                                    <input class="file-input is-small" type="file" ref="fileInput"  multiple @change="onFileChangeAdd, handleFiles">
                                    <span class="file-cta">
                                        <span class="file-icon">
                                            <i class="fas fa-upload"></i>
                                        </span>
                                        <span class="file-label is-small">
                                            Choose images...
                                        </span>
                                    </span>
                                    <span class="file-name">
                                        {{ showFilesNo }}
                                    </span>
                                </label>
                            </div>
                            <div class="field">
                                <div class="control mt-6">
                                    <span class="tag  is-small" v-for="image in businessFormData.business_images">
                                        <img :src="`${image}`" width="100" height="50" />
                                        <button class="delete is-small"
                                            @click="removeImageFromBusinessAdd(image)"></button>
                                    </span>
                                </div>
                            </div>
                            <button type="submit" class="button is-primary is-small">Add</button> 
                            <button type="link" class="button is-primary is-light is-small ml-2" v-show="showMessage"> {{ message }}</button>
                        
                   
                </form>
            </section>

            

     
</template>
