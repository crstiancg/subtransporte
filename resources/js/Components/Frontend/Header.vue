<script setup>
import { ref, onMounted } from "vue";
import { Head, Link } from '@inertiajs/vue3';
import NavLink from '@/Components/NavLink.vue';
const showMobileMenu = ref("false");
const scrollBg = ref(false);

const navigations = [
  // { name: "Infracción", href: "infraccion.index" },
  // { name: "Licencia", href: "licencias.index" },
];
const setScrollBg = (value) => {
  scrollBg.value = value;
};

onMounted(() => {
  window.addEventListener("scroll", () => {
    return window.scrollY > 50 ? setScrollBg(true) : setScrollBg(false);
  });
});
</script>
<template>
  <Head title="Gerencia de Transporte" />
  <nav
    class="w-full fixed z-10 bg-white px-2 sm:px-4 py-2.5 lg:shadow-lg shadow-md dark:bg-gray-800"
    :class="{
      'bg-light-primary dark:bg-dark-primary': scrollBg,
      'bg-white dark:bg-slate-800': !scrollBg,
    }"
  >
    <div
      class="container flex flex-wrap justify-between items-center mx-auto"
      bis_skin_checked="1"
    >
      <a :href="route('licencias.index')" class="flex items-center">
        <img
          src="https://portal.munipuno.gob.pe/sites/default/files/LOGO%20MPP%202022_2.png"
          class="mr-3 h-6 sm:h-9"
          alt="Puno Logo"
        />
        <span
          class="
            self-center
            text-xl
            font-semibold
            whitespace-nowrap
            dark:text-white
          "
          >Gerencia de Transportes</span
        >
      </a>
      <!-- <button
        @click="showMobileMenu = !showMobileMenu"
        data-collapse-toggle="navbar-default"
        type="button"
        class="
          inline-flex
          items-center
          p-2
          ml-3
          text-sm text-gray-500
          rounded-lg
          md:hidden
          hover:bg-gray-100
          focus:outline-none focus:ring-2 focus:ring-gray-200
          dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600
        "
        aria-controls="navbar-default"
        aria-expanded="false"
      >
        <span class="sr-only">Open main menu</span>
        <svg
          class="w-6 h-6"
          aria-hidden="true"
          fill="currentColor"
          viewBox="0 0 20 20"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            fill-rule="evenodd"
            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
            clip-rule="evenodd"
          ></path>
        </svg>
      </button> -->
      <!-- <div
        class="w-full md:block md:w-auto"
        :class="{ hidden: showMobileMenu }"
        id="navbar-default"
        bis_skin_checked="1"
      >
        <ul
          class="
            flex flex-col
            p-4
            mt-4
            rounded-lg
            border border-light-tail-500
            dark:border-dark-navy-100
            md:flex-row md:space-x-8 md:mt-0 md:font-medium md:border-0
          "
        >
        <li v-for="(navigation, index) in navigations" :key="index">
          <NavLink :href="route('infraccion.index')" :active="route().current('infraccion.index')">
                                      Infraccion
          </NavLink>
          <a
              :href="route(navigation.href)"
              class="
                block
                py-2
                pr-4
                pl-3
                text-light-tail-500
                rounded
                dark:text-white
                hover:text-light-tail-100
                dark:hover:text-white
              "
              :active="navigation.href"
              aria-current="page"
              >{{ navigation.name }}</a
            >
          </li>
        </ul>
      </div> -->
    </div>
  </nav>
</template>