<script>
import { RouterLink, RouterView } from "vue-router";

export default {
  name: "front-layout",
  props: {
    name: {},
  },
};
</script>

<template>
  <div class="AppLayout">
    <nav class="AppLayout__nav">
      <ul class="nav-links">
        <li class="nav-link logo">
          <a href="https://bigscreenvr.com">
            <img src="@/assets/images/bigscreen.svg" alt="logo de BigScreen" />
          </a>
        </li>
        <li class="nav-link">
          <router-link to="/">Sondage</router-link>
        </li>
      </ul>
    </nav>
    <main :class="name" class="AppLayout__main">
      <slot></slot>
    </main>
    <div class="AppLayout__footer Footer_body__2HRIA">
      <div class="container Footer_container__1YkT_">
        <div class="Footer_col__1VR2s">
          <div class="Footer_box__hzPYS">
            <a class="Footer_logo__1mqfJ" href="https://bigscreenvr.com/">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="95"
                height="95"
                viewBox="0 0 95 95"
              >
                <g id="icon" transform="translate(5.782 6.926)">
                  <g id="Logo" transform="translate(10.641 16.206)">
                    <rect
                      id="Rectangle_1186"
                      data-name="Rectangle 1186"
                      width="95"
                      height="95"
                      rx="24"
                      transform="translate(-16.422 -23.132)"
                      fill="#23262f"
                    ></rect>
                    <g
                      id="Group_210"
                      data-name="Group 210"
                      transform="translate(0.297 7.794)"
                    >
                      <rect
                        id="Rectangle_4"
                        data-name="Rectangle 4"
                        width="6.118"
                        height="23.678"
                        transform="translate(27.53 4.735)"
                        fill="#fff"
                      ></rect>
                      <path
                        id="Path_198"
                        data-name="Path 198"
                        d="M4.735,4.735V0H0V28.413H23.677V4.735H4.735ZM18.942,23.677H4.735V9.471H18.942Z"
                        fill="#fff"
                      ></path>
                      <path
                        id="Path_199"
                        data-name="Path 199"
                        d="M68.735,8H64V26.942H82.942v4.735H68.735v4.735H87.677V8H68.735ZM82.942,22.206H68.735V12.735H82.942Z"
                        transform="translate(-26.117 -3.265)"
                        fill="#fff"
                      ></path>
                    </g>
                  </g>
                </g>
              </svg>
            </a>
          </div>
          <div class="Footer_item__2NghX">
            <div class="Footer_category__3prEp">
              menu
              <svg class="" width="9" height="9" viewBox="0 0 16 16">
                <path
                  d="M15.039 3.961c-.653-.653-1.713-.653-2.366 0L8 8.634 3.327 3.961c-.653-.653-1.713-.653-2.366 0s-.653 1.713 0 2.366l5.856 5.856c.653.653 1.713.653 2.366 0l5.856-5.856c.653-.653.653-1.713 0-2.366z"
                ></path>
              </svg>
            </div>
            <div class="Footer_menu__37aWI">
              <a
                class="Footer_link__3ngYf"
                href="https://blog.bigscreenvr.com/"
                target="_blank"
                rel="noreferrer"
                >Blog</a
              ><a
                class="Footer_link__3ngYf"
                href="mailto:support@bigscreenvr.com"
                >Contact</a
              ><a class="Footer_link__3ngYf" href="/login"
                >Se connecter</a
              >
            </div>
          </div>
        </div>
        <div class="Footer_col__1VR2s">
          <div class="Footer_category__3prEp">follow us</div>
          <div class="Footer_socials__2zt5G">
            <a
              class="Footer_social__3k5Qz"
              href="https://twitter.com/bigscreenvr"
              target="_blank"
              rel="noopener noreferrer"
            >
              <svg class="" width="19" height="19" viewBox="0 0 16 16">
                <path
                  d="M2.121 9.233C1.018 9.236.306 10.492.986 11.444c.973 1.363 2.737 2.456 5.681 2.456 4.563 0 8.226-3.719 7.714-8.113l.751-1.503c.521-1.042-.384-2.227-1.527-1.999l-.993.198c-.263-.139-.535-.244-.768-.32-.454-.148-1.003-.265-1.511-.265-.913 0-1.701.234-2.327.704-.619.464-.968 1.075-1.159 1.635-.088.258-.147.518-.185.766-.354-.111-.715-.261-1.069-.445-.802-.415-1.451-.942-1.817-1.404-.614-.775-1.915-.717-2.371.29-.643 1.42-.467 3.102.111 4.462a6.57 6.57 0 0 0 .754 1.324l-.151.001zm4.546 3.333c-2.576 0-3.907-.933-4.596-1.898-.031-.043 0-.102.054-.103.701-.002 2.139-.035 3.087-.59.049-.029.038-.101-.016-.119-2.211-.743-3.467-3.891-2.575-5.86.02-.045.081-.051.112-.012C3.752 5.271 5.98 6.531 7.919 6.566c.042.001.074-.037.067-.079-.078-.507-.376-3.254 2.347-3.254.65 0 1.618.317 1.974.642a.07.07 0 0 0 .061.017l1.498-.3c.054-.011.098.046.073.095l-.929 1.858c-.006.013-.008.028-.006.042.651 3.658-2.345 6.978-6.337 6.978z"
                ></path>
              </svg> </a
            ><a
              class="Footer_social__3k5Qz"
              href="https://www.facebook.com/bigscreenvr"
              target="_blank"
              rel="noopener noreferrer"
            >
              <svg class="" width="16" height="16" viewBox="0 0 16 16">
                <path
                  d="M7.967.017a8 8 0 1 1 0 16 8 8 0 1 1 0-16zm0 1.6a6.4 6.4 0 0 0-6.4 6.4c0 2.982 2.039 5.487 4.799 6.198l.001-4.598h-.8a.8.8 0 1 1 0-1.6h.8v-1.6a2.4 2.4 0 0 1 2.4-2.4h.8a.8.8 0 1 1 0 1.6h0-.8a.8.8 0 0 0-.8.8h0v1.6h1.6a.8.8 0 1 1 0 1.6h0-1.6v4.8a6.4 6.4 0 0 0 0-12.8z"
                ></path>
              </svg> </a
            ><a
              class="Footer_social__3k5Qz"
              href="https://youtube.com/bigscreenvr"
              target="_blank"
              rel="noopener noreferrer"
            >
              <svg class="" width="21" height="21" viewBox="0 0 16 16">
                <g transform="translate(0 2.5), scale(0.7)">
                  <path
                    id="Vector"
                    d="M11,15c-3.293,0-5.961-.126-7.619-.231A3.432,3.432,0,0,1,.187,11.544C.063,9.911,0,8.55,0,7.5S.063,5.089.187,3.456A3.433,3.433,0,0,1,3.381.23C5.8.078,8.365,0,11,0c2.6,0,5.233.08,7.62.23a3.432,3.432,0,0,1,3.193,3.226C21.937,5.1,22,6.457,22,7.5s-.063,2.4-.188,4.044a3.43,3.43,0,0,1-3.193,3.225C16.961,14.874,14.293,15,11,15ZM11,1.875c-3.242,0-5.871.123-7.506.227A1.593,1.593,0,0,0,2.015,3.6c-.121,1.587-.182,2.9-.182,3.9s.061,2.312.182,3.9a1.592,1.592,0,0,0,1.478,1.5c2.387.151,4.912.228,7.506.228s5.12-.077,7.506-.228a1.593,1.593,0,0,0,1.479-1.5c.083-1.085.181-2.642.181-3.9s-.1-2.813-.181-3.9a1.594,1.594,0,0,0-1.479-1.5C16.871,2,14.242,1.875,11,1.875Z"
                  ></path>
                  <path
                    id="Vector-2"
                    d="M4.356,2.109a.917.917,0,0,1,0,1.525L1.425,5.589A.917.917,0,0,1,0,4.826V.918A.917.917,0,0,1,1.425.155Z"
                    transform="translate(9.167 4.128)"
                  ></path>
                </g>
              </svg> </a
            ><a
              class="Footer_social__3k5Qz"
              href="https://reddit.com/r/bigscreen"
              target="_blank"
              rel="noopener noreferrer"
            >
              <svg class="" width="22" height="22" viewBox="0 0 16 16">
                <g transform="translate(4 1), scale(0.7)">
                  <path
                    id="Vector"
                    d="M5.526,17.438c-5.1,0-9.243-2.767-9.243-6.167a4.17,4.17,0,0,1,.058-.7A2.344,2.344,0,0,1-4.771,8.581,2.345,2.345,0,0,1-2.429,6.239a2.336,2.336,0,0,1,1.552.588A11.89,11.89,0,0,1,5.261,5.105L6.823.339l.341.08.008,0,3.64.857a1.929,1.929,0,1,1-.154.758L7.337,1.254,6.072,5.114a11.763,11.763,0,0,1,5.908,1.745,2.342,2.342,0,1,1,2.739,3.762,4.172,4.172,0,0,1,.051.65c0,3.4-4.148,6.167-9.244,6.167Zm-8.393-6.9a3.5,3.5,0,0,0-.077.731c0,2.975,3.8,5.394,8.471,5.394S14,14.245,14,11.271a3.48,3.48,0,0,0-.071-.7.388.388,0,0,1-.038-.168,4.922,4.922,0,0,0-1.982-2.679.383.383,0,0,1-.166-.117A11.124,11.124,0,0,0,5.526,5.876a11.16,11.16,0,0,0-6.168,1.7A.4.4,0,0,1-.8,7.684a4.969,4.969,0,0,0-2.032,2.695.383.383,0,0,1-.032.148A.121.121,0,0,1-2.867,10.54ZM12.626,7.325a5.771,5.771,0,0,1,1.89,2.507,1.57,1.57,0,0,0-1.89-2.507ZM-2.429,7.011A1.571,1.571,0,0,0-4,8.581a1.571,1.571,0,0,0,.555,1.2A5.833,5.833,0,0,1-1.532,7.293,1.571,1.571,0,0,0-2.429,7.011ZM12.586.877a1.156,1.156,0,1,0,1.155,1.156A1.157,1.157,0,0,0,12.586.877ZM5.568,15.238A4.53,4.53,0,0,1,2.235,14.2a.386.386,0,0,1,.547-.546,3.837,3.837,0,0,0,2.786.807,3.842,3.842,0,0,0,2.787-.807A.386.386,0,1,1,8.9,14.2a4.532,4.532,0,0,1-3.333,1.034Z"
                    transform="translate(0)"
                    stroke="#777e90"
                    stroke-width="0.7"
                  ></path>
                  <path
                    id="Vector-2"
                    d="M17.884,22.35A1.464,1.464,0,0,0,16.436,23.8a1.445,1.445,0,0,0,1.449,1.425A1.425,1.425,0,0,0,19.309,23.8a1.444,1.444,0,0,0-1.425-1.447Zm-6.243,0A1.463,1.463,0,0,0,10.194,23.8a1.444,1.444,0,0,0,1.447,1.425A1.425,1.425,0,0,0,13.066,23.8a1.444,1.444,0,0,0-1.425-1.447Z"
                    transform="translate(-9.183 -13.65)"
                  ></path>
                </g>
              </svg>
            </a>
          </div>
          <a
            class="button Footer_button__31KA4"
            href="https://discord.gg/bigscreen"
            target="_blank"
            rel="noreferrer"
          >
            <svg
              class="Footer_comicon__1Gxpr"
              width="26"
              height="26"
              viewBox="0 0 16 16"
            >
              <defs>
                <clipPath id="clip-path">
                  <rect
                    id="Rectangle_1201"
                    width="27"
                    height="21"
                    transform="translate(0 0)"
                  ></rect>
                </clipPath>
              </defs>
              <g
                transform="translate(0 2), scale(0.5)"
                clip-path="url(#clip-path)"
              >
                <path
                  id="Vector"
                  d="M21.784,2.038A21.22,21.22,0,0,0,16.546.413a.08.08,0,0,0-.084.04,14.781,14.781,0,0,0-.652,1.34,19.59,19.59,0,0,0-5.883,0A13.557,13.557,0,0,0,9.264.453.083.083,0,0,0,9.18.413,21.161,21.161,0,0,0,3.942,2.038a.075.075,0,0,0-.034.03,21.718,21.718,0,0,0-3.8,14.647.088.088,0,0,0,.033.06,21.339,21.339,0,0,0,6.426,3.248.083.083,0,0,0,.09-.03A15.252,15.252,0,0,0,7.97,17.855a.081.081,0,0,0-.045-.113,14.053,14.053,0,0,1-2.007-.957.083.083,0,0,1-.008-.137c.135-.1.27-.206.4-.312a.08.08,0,0,1,.083-.011,15.218,15.218,0,0,0,12.932,0,.079.079,0,0,1,.084.01c.129.106.264.212.4.313a.082.082,0,0,1-.007.137,13.187,13.187,0,0,1-2.008.956.082.082,0,0,0-.044.114,17.125,17.125,0,0,0,1.314,2.137.082.082,0,0,0,.09.031,21.268,21.268,0,0,0,6.436-3.248.083.083,0,0,0,.033-.059,21.575,21.575,0,0,0-3.8-14.647A.065.065,0,0,0,21.784,2.038ZM8.6,13.791A2.473,2.473,0,0,1,6.286,11.2,2.46,2.46,0,0,1,8.6,8.6,2.446,2.446,0,0,1,10.912,11.2,2.46,2.46,0,0,1,8.6,13.791Zm8.551,0A2.473,2.473,0,0,1,14.837,11.2,2.46,2.46,0,0,1,17.15,8.6,2.446,2.446,0,0,1,19.462,11.2,2.453,2.453,0,0,1,17.15,13.791Z"
                  transform="translate(0.678 0.804)"
                ></path>
              </g>
            </svg>
            JOIN THE DISCORD</a
          >
        </div>
        <div class="Footer_col__1VR2s">
          <div class="Footer_category__3prEp">newsletter</div>
          <div class="Footer_info__TSamq">
            Subscribe to our newsletter so you don't miss out on special events,
            updates, and more!
          </div>
          <a
            class="button-stroke"
            href="http://news.bigscreenvr.com"
            target="_blank"
            rel="noreferrer"
            >Sign Up</a
          >
        </div>
      </div>
    </div>
  </div>
</template>

<style lang="scss" scoped>
@import "FrontLayout.scss";
</style>
