#Localization 

1. **Install `vue-i18n`**:

   ```bash
   npm install vue-i18n
   ```

2. **Create a `locales` folder** in your project and add JSON files for each language. For example, you might have `en.json` and `es.json`.

   `locales/en.json`:
   ```json
   {
     "welcome": "Welcome to Attestto",
     "level_up": "We're here to help you level up.",
     "advice": "Use a long, easy-to-remember secret phrase like..."
     // Add more key-value pairs for other texts
   }
   ```

   `locales/es.json`:
   ```json
   {
     "welcome": "Bienvenido a Attestto",
     "level_up": "Estamos aquí para ayudarte a mejorar.",
     "advice": "Utiliza una frase secreta larga y fácil de recordar como..."
     // Add more key-value pairs for other texts
   }
   ```

3. **Setup `vue-i18n` in your Vue.js app**:

   In your main `app.js` or where you initialize your Vue.js app, import and set up `vue-i18n`. You can create a global instance of it.

   ```javascript
   import { createApp } from 'vue';
   import { createI18n } from 'vue-i18n';
   import App from './App.vue';

   const i18n = createI18n({
     locale: 'en', // Default locale
     messages: {
       en: require('./locales/en.json'),
       es: require('./locales/es.json'),
       // Add more languages as needed
     },
   });

   const app = createApp(App);

   app.use(i18n);

   app.mount('#app');
   ```

4. **Use localization in your template**:

   Update your template to use the localization keys.

   ```vue
   <template>
       <section class="h-screen flex items-center justify-center bg-no-repeat inset-0 bg-cover bg-[url('../images/bg.png')]">
           <!-- ... Other code ... -->
           <div class="bg-sky-600 text-white rounded-lg flex flex-col justify-between gap-10 h-full w-full p-7">
               <span class="font-semibold tracking-widest uppercase">{{ $t('welcome') }}</span>
               <div>
                   <h1 class="text-3xl/tight mb-4">{{ $t('level_up') }}</h1>
                   <p class="text-gray-200 font-normal leading-relaxed">{{ $t('advice') }}</p>
               </div>
               <!-- ... Other code ... -->
           </div>
           <!-- ... Other code ... -->
       </section>
   </template>
   ```

   In this example, `{{ $t('welcome') }}`, `{{ $t('level_up') }}`, and `{{ $t('advice') }}` are replaced with the corresponding localized text.

5. **Switching between languages**:

   You can provide a mechanism for users to switch between languages and update the `locale` in the `vue-i18n` instance. You can use a button or any other UI element to trigger the language switch.

   ```javascript
   // Inside your component or app setup
   const switchLanguage = (locale) => {
     i18n.global.locale = locale;
   };
   ```

   ```vue
   <button @click="switchLanguage('en')">English</button>
   <button @click="switchLanguage('es')">Español</button>
   ```
