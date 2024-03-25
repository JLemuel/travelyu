<!-- resources/views/components/svg-map.blade.php -->
<style>
    .m-auto {
        margin: auto
    }

    .w-\[75\%\] {
        width: 75%
    }

    @media (min-width: 768px) {
        .md\:w-\[55\%\] {
            width: 55%
        }
    }

    @media (min-width: 1024px) {
        .lg\:w-\[70\%\] {
            width: 70%
        }
    }

    @media (min-width: 1280px) {
        .xl\:w-\[50\%\] {
            width: 50%
        }
    }
</style>
<div id="routeNamesss" data-route-name="{{ $routeName }}" x-data="{ isHovered: false }"
    class="w-[75%] md:w-[55%] lg:w-[70%] xl:w-[50%] m-auto">
    {{-- class="w-[75%] md:w-[55%] lg:w-[70%] xl:w-[18%] m-auto"> --}}

    <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 354.21 792.2">
        <defs>
            <style>
                .cls-1 {
                    fill: white;
                    stroke: #416D19;
                    stroke-width: .5px;
                    border-style: solid;
                    border-color: #416D19;
                    border-width: 20px;
                }

                .cls-1:hover {
                    fill: #416D19;
                    < !-- fill: rgba(255, 255, 255, 0.8);
                    /* Change the fill color on hover with opacity */
                    -->cursor: pointer;
                    stroke: purple;
                    /* Border color on hover */
                    border-style: solid;
                    border-color: #416D19;
                    border-width: 50px;
                }

                .cls-2 {
                    fill: #9BCF53;
                    font-family: Poppins-Bold, Poppins;
                    font-size: 9px;
                    font-weight: 700;
                }


                .cls-2:hover~.cls-1 {
                    fill: #416D19;
                    /* Change the fill color of .cls-1 when .cls-2 is hovered */
                }
            </style>
        </defs>


        <!-- San Gabriel-->
        <path x-on:mouseover="isHovered = true" x-on:mouseout="isHovered = false"
            :class="{ 'cls-1': true, 'cls-1-hover': isHovered }" x-data="{ parameter: 'San Gabriel', clicked: false }"
            @click.prevent="if (!clicked) { clicked = true; redirectToRoute(parameter, routesName); }" class="cls-1"
            d="m333.99,283.53c-8.31,10.14-16.05,19.68-23.92,29.11-3.25,3.9-6.46,7.95-10.34,11.14-1.82,1.51-5.52,2.18-7.8,1.44-13.42-4.35-26.72-9.07-39.95-13.96-12.04-4.45-23.9-9.38-35.92-13.9-8.57-3.22-17.28-6.03-25.87-9.16-4.08-1.49-8.03-3.3-12.04-4.96-.88-.49-1.74-.98-2.61-1.47-1.79-.72-3.57-1.44-5.36-2.16l.07.04c-1.78-.71-3.57-1.43-5.35-2.14l.05.03c-1.07-.36-2.15-.73-3.22-1.09l.04.03c-1.4-.71-2.82-1.42-4.22-2.12-2.92-.27-4.98-1.38-5-4.77-.1-11.72-.27-23.44-.32-35.15,0-.88.72-1.76,1.1-2.64-.28-6.19,2.89-10.83,6.8-15.14.53-.56,1.07-1.14,1.61-1.7.36-.72.72-1.42,1.08-2.13l-.04.04c.72-1.07,1.43-2.14,2.14-3.22.71-1.06,1.41-2.11,2.11-3.17,1.05-1.4,2.1-2.8,3.15-4.2,1.06-2.12,2.14-4.23,3.2-6.36.36-.36.73-.74,1.09-1.1.65-.86,1.29-1.7,1.93-2.56,1.14-2.37,2.28-4.74,3.59-7.49.76.38,1.3.9,1.85.9,9.09.12,14.34,5.95,19.71,12.31,5.81,6.89,13.62,11.34,21.62,15.52,11.17,5.83,21.82,12.69,33.09,18.34,7.03,3.52,14.65,6.09,22.26,8.09,2.85.74,6.54-1.11,9.67-2.25,2-.72,3.68-2.31,6-3.85.29,1.75.64,2.99.67,4.24.16,6.97,3.24,8.69,9.91,11.67,2.78,1.24,6,2.13,8.07,4.15,2.41,2.34,5.78,5.05,3.35,9.47-2.21,4-.18,6.06,3.18,8.34,4.92,3.35,9.32,7.48,14.62,11.83Z" />

        <!-- San Fernando-->
        <path x-on:mouseover="isHovered = true" x-on:mouseout="isHovered = false"
            :class="{ 'cls-1': true, 'cls-1-hover': isHovered }" x-data="{ parameter: 'San Fernando', clicked: false }"
            @click.prevent="if (!clicked) { clicked = true; redirectToRoute(parameter, routesName); }" class="cls-1"
            d="m170.4,349.34c-7.14,1.7-10.94,7.38-14.68,12.86-3.79,5.53-6.63,11.73-10.65,17.07-1.79,2.39-5.64,5.07-8.2,4.75-14.29-1.77-29.15-.43-42.66-6.93-10.29-4.95-20.72-9.65-30.7-15.18-5.48-3.04-10.3-7.37-15.09-11.5-1.53-1.33-2.81-3.87-2.83-5.86-.07-8.45-6-13.02-11.28-17.97-3.64-3.43-7.71-6.4-11.58-9.58.1-.64.19-1.28.29-1.92,2.24-.14,4.48-.27,6.72-.41,1.03.65,2.05,1.31,3.08,1.95h-.02.03c6.33,1.05,12.66,2.11,18.99,3.17,2.47-6.55,4.94-13.1,7.43-19.71,6.3.04,9.15-3.01,8.38-9.16-.63-4.94,2.53-7.88,7.49-6.91,4.92.97,9.82,2.1,14.76,3,.66.12-.07.09,1.91.3,1.93.75,1.93.74,2.09.68.86,1.04,1.63.7,2.69.96,3.89.98,7.87,1.68,11.85,2.1,3.74.38,7.52.27,11.28.37,8.23.39,16.47.77,24.7,1.15,4.24-1.05,8.5-2.01,12.69-3.22,1.44-.41,2.89-1.25,4.01-2.26,4.56-4.14,7.68-4.19,12.36.07.71,1.06,2,2.1,2.03,3.17.15,5.26-.03,10.54-.1,15.8.1,12.59.06,25.17.36,37.75.11,4.12-1.33,5.84-5.35,5.46Z" />

        <!--Santol-->
        <path x-on:mouseover="isHovered = true" x-on:mouseout="isHovered = false"
            :class="{ 'cls-1': true, 'cls-1-hover': isHovered }" x-data="{ parameter: 'Santol', clicked: false }"
            @click.prevent="if (!clicked) { clicked = true; redirectToRoute(parameter, routesName); }" class="cls-1"
            d="m302.45,201.14c.95,4.64-1.86,7.7-4.35,10.74-4.15,5.09-6.81,10.64-7.37,17.25-.37,4.35-3.29,5.36-7.38,6.22-13.52,2.86-23.15-5.36-33.53-11.14-12.88-7.19-25.48-14.9-37.94-22.79-3.48-2.21-5.78-6.21-9.12-8.73-4.62-3.47-9.4-7.11-14.69-9.22-6.41-2.56-6.85-3.01-3.66-9.27,2-3.92,2.7-8.49,4.16-12.7.26-.76,1.37-1.22,2.09-1.81-.12-1.48-.67-3.08-.29-4.41,1.93-6.66,4.05-13.26,6.23-19.83.25-.74,1.37-1.17,2.08-1.75,1.42-5.38,2.23-11.04,4.46-16.07,1.84-4.14,6.22-1.46,8.88-.6,9.92,3.22,19.61,7.16,29.38,10.83,11.92,4.47,24.16,7.52,36.92,8.31,1.26.08,2.47,1.23,3.67,1.94,3.44,2.04,7.08,3.83,10.22,6.28,2.09,1.63,3.85,4,5.05,6.4,2.26,4.52,4.2,9.23,5.85,14,.52,1.52.24,3.81-.57,5.23-3.31,5.72-4.57,11.38-2.34,17.95,1.41,4.17,1.37,8.8,2.25,13.17Z" />

        <!-- aringay -->
        <path -on:mouseover="isHovered = true" x-on:mouseout="isHovered = false"
            :class="{ 'cls-1': true, 'cls-1-hover': isHovered }" x-data="{ parameter: 'Aringay', clicked: false }"
            @click.prevent="if (!clicked) { clicked = true; redirectToRoute(parameter, routesName); }" class="cls-1"
            d="m220.86,558.7c-6.55,4.5-13.25,8.77-19.8,13.26-1.05.72-1.66,2.08-2.48,3.15l-.5.21c-.43.2-.27.16-.78.41-.25.13-.31.17-.6.2-1.77.08-3.12.62-4.91,1.26-.94.89-2.15,1.24-3.26,1.59-11.96,3.71-23.97,7.27-35.98,10.81-.32.09-.83-.48-1.25-.74-1.67.55-3.37,1.05-5.02,1.67-12.06,4.55-24.19,5.81-36.93,2.47-6.3-1.65-13.07-1.5-19.63-2.16-1.35-.65-2.71-1.29-4.07-1.93l-1.06-1.06c-.36-.36-.71-.71-1.06-1.06-.01-.01-.03-.03-.04-.04-.33-.34-.67-.67-1.01-1.02,0-.01-.03-.02-.04-.03-.05-.04-.1-.08-.16-.12-.4-.32-.82-.64-1.23-.96-.35-.13-.58-.38-.69-.74-2.65-2.82-5.3-5.64-7.96-8.46,4.41-1.07,6.62.75,8,3.87,2.15.56,4.29,1.13,6.43,1.7,1.74-5.09-.91-9.94-6.48-13.3-2.47-1.48-4.28-4.08-6.39-6.17-.34-.07-.68-.14-1.02-.2-.33-.34-.66-.68-1-1.03,1.95-.39,3.88-1.03,5.85-1.13,11.73-.6,23.47-1.08,35.21-1.59-2.07-5.36-7.02-4.38-11.15-4.92-7.63-1-15.3-1.61-22.92-2.65-2.7-.37-7.46,2.72-7.61-2.2-.1-2.86,2.96-6.55,5.6-8.56,2.22-1.7,5.88-1.51,8.9-2.15,6.42-.03,12.83-.13,19.25-.04,1.63.02,3.25.65,4.88,1,4.83-.41,9.6-.07,14.44-.48l1.98.08c3.82,2.75,6.43,1.54,10.34-1.76,6.03-5.09,13.13-8.92,19.78-13.27,13.73-9,27.01-18.84,41.41-26.59,5.76-3.1,14.02-2.23,21.05-1.75,1.6.11,3.43,5.97,4.06,9.39,2.13,11.48,3.54,23.1,5.68,34.58,1.55,8.29-.87,15.68-7.83,20.46Z" />

        <!-- Bauang-->
        <path x-on:mouseover="isHovered = true" x-on:mouseout="isHovered = false"
            :class="{ 'cls-1': true, 'cls-1-hover': isHovered }" x-data="{ parameter: 'Bauang', clicked: false }"
            @click.prevent="if (!clicked) { clicked = true; redirectToRoute(parameter, routesName); }" class="cls-1"
            d="m142.72,488.12c-9.48.3-18.96.61-28.43.91-11.82.04-23.64.12-35.46.04-.78,0-1.55-1.18-2.33-1.81-.54-1.1-1.23-2.15-1.62-3.31-2.96-8.73-5.75-17.52-8.84-26.2-.76-2.16-2.41-4-3.65-5.99-.37-.54-.74-1.09-1.11-1.63-.35-.7-.69-1.39-1.04-2.09-.01-.01-.01-.02-.02-.03-1.05-1.77-2.12-3.53-3.17-5.29l.03.03c-.36-1.08-.72-2.16-1.08-3.24-.35-.7-.71-1.41-1.06-2.12l.04.06c-.36-.71-.73-1.41-1.08-2.12-3.4-3.82-4.16-8.07-2.1-12.79l-.04.03c.32-.64.63-1.29.94-1.94,1.26-2.62,3.05-5.12,3.7-7.89,3.06-13.09,7.81-25.92,6.67-39.75-.15-1.72.61-3.51.88-4.89,15.89,5.9,31.6,11.74,47.3,17.58,3.65-.01,7.34.32,10.93-.13,5.02-.62,7.5,1.29,7.82,6.25,1.85,8.85,3.7,17.69,5.55,26.54,2.42,11.54,4.91,23.06,7.22,34.61,1.51,7.56,2.75,15.16,4.11,22.74.72,2.97,1.87,5.91,2.06,8.92.31,4.85-3.48,3.48-6.22,3.51Z" />

        <!-- Naguilian -->
        <path x-on:mouseover="isHovered = true" x-on:mouseout="isHovered = false"
            :class="{ 'cls-1': true, 'cls-1-hover': isHovered }" x-data="{ parameter: 'Naguilian', clicked: false }"
            @click.prevent="if (!clicked) { clicked = true; redirectToRoute(parameter, routesName); }" class="cls-1"
            d="m219.91,488.23c-2.55.67-5.11,1.89-7.67,1.91-12.82.13-25.64-.05-38.46-.12-1.03-.08-2.06-.17-3.08-.25l-.09-.22s0-.02,0-.03h-.01c-5.04-.97-10.08-1.94-15.13-2.9-1.21-3.72-2.72-7.38-3.58-11.19-1.19-5.27-1.9-10.64-2.82-15.98-.35-1.74-.71-3.49-1.07-5.23-1.75-8.87-3.51-17.73-5.27-26.6-2.11-10.07-4.22-20.15-6.33-30.22-.41-1.45-.82-2.9-1.23-4.34-.64-1.36-2.07-3-1.71-4.02.46-1.34,2.19-2.85,3.61-3.12,2.88-.56,5.91-.34,8.88-.45l-.06.08s.04-.03.06-.05c.31-.28.63-.56.94-.84,6.11-12.35,12.09-24.8,25.5-32.35,1.89,2.36,3.69,4.63,6.07,7.6,10.18,1.17,21.47,2.39,32.72,3.88,1.23.16,2.78,1.71,3.27,2.97,2.39,6.12-3.23,23.78-8.6,27.77-.89,1.4-1.78,2.79-2.66,4.19-2.67,6-5.13,12.1-8.06,17.96-2.18,4.32-5.28,8.19-7.33,12.56-.76,1.64-.26,4.39.6,6.18,5.58,11.5,11.35,22.91,17.25,34.25.63,1.2,2.44,1.87,3.79,2.61,6.36,3.45,10.76,8.14,10.48,15.95Z" />

        <!-- Bagulin -->
        <path x-on:mouseover="isHovered = true" x-on:mouseout="isHovered = false"
            :class="{ 'cls-1': true, 'cls-1-hover': isHovered }" x-data="{ parameter: 'Bagulin', clicked: false }"
            @click.prevent="if (!clicked) { clicked = true; redirectToRoute(parameter, routesName); }" class="cls-1"
            d="m295.54,363.07c-5.18,5.44-9.12,9.96-18.11,8.05-13.7-2.91-27.83-3.72-41.74-5.71-7.8-1.12-15.5-2.91-23.27-4.23-8.92-1.52-17.89-2.73-26.78-4.38-1.74-.32-3.23-2.03-4.84-3.1-.37-1.05-1.05-2.1-1.05-3.15-.03-13.4.03-26.81.07-40.22-.05-1.84-.1-3.68-.15-5.52.03-1.34.06-2.68.1-4.02.46-3.46.92-6.92,1.57-11.79,7.59,3,14.7,5.8,21.81,8.61,4.52,1.29,9.12,2.34,13.54,3.89,17.86,6.29,35.67,12.73,53.5,19.12,6.77,2.43,13.62,4.68,20.24,7.48,1.39.58,3.12,4.16,2.66,4.74-5.43,6.82-2.01,12.38,2.2,17.72,3.36,4.25,4.96,7.55.25,12.51Z" />

        <!-- Sudipen -->
        <path x-on:mouseover="isHovered = true" x-on:mouseout="isHovered = false"
            :class="{ 'cls-1': true, 'cls-1-hover': isHovered }" x-data="{ parameter: 'Sudipen', clicked: false }"
            @click.prevent="if (!clicked) { clicked = true; redirectToRoute(parameter, routesName); }" class="cls-1"
            d="m288.68,124.44c-1.98,4.47-4.92,7.68-10.24,7.95-7.7.39-15.21-.21-22.49-3-7.11-2.72-14.31-5.23-21.48-7.83-6.61-2.73-13.23-5.46-19.84-8.18-7.87-2.42-8.21-2.66-5.43-9.77,2.51-6.38,5.69-12.5,8.57-18.73,1.23-4.06,1.51-8.81,3.86-12.06,5.59-7.71,3.62-14.7.2-22.29-2.65-5.89-4.59-12.12-6.62-18.28-.26-.78.57-2.66,1.28-2.91,7.76-2.75,15.18-5.65,24.04-3.02,10.76,3.19,21.62,2.45,30.85-5.45,1.03-.87,2.46-1.27,4.56-2.32-.48,3-.79,4.98-1.1,6.96-.11,8.99-.22,17.98-.34,26.98,5.7,4.31,2.38,8.91-.28,12.6-7.82,10.88-7.89,23.23-7.66,35.68.07,3.94,5.24,7.6,11.01,9.11,2.82.74,5.74,2.06,7.99,3.9,3.24,2.64,5.06,6.26,3.12,10.66Z" />

        <!-- Balaon -->
        <path x-on:mouseover="isHovered = true" x-on:mouseout="isHovered = false"
            :class="{ 'cls-1': true, 'cls-1-hover': isHovered }" x-data="{ parameter: 'Balaoan', clicked: false }"
            @click.prevent="if (!clicked) { clicked = true; redirectToRoute(parameter, routesName); }" class="cls-1"
            d="m207.48,95.36c-3.03,7.92-6.03,15.77-9.03,23.61-1.63,4.12-3.26,8.24-4.9,12.35-.36,1.43-.73,2.87-1.1,4.3l.04-.06c-.35.71-.71,1.4-1.05,2.11-.75,3.15-1.5,6.3-2.25,9.45-1.05,2.54-2.1,5.07-3.15,7.61-2.09,6.34-4.17,12.67-6.25,19.01l.02-.02c-.37,1.06-.74,2.12-1.11,3.17-1.21.38-2.86,1.45-3.54,1.01-3.04-1.96-5.82-4.33-8.66-6.58-10.65-8.44-21.23-16.95-31.96-25.28-1.28-1-3.28-1.49-4.94-1.48-10.43.06-20.98-.58-31.24.81-8.08,1.1-15.8,4.79-24.54,7.6-5.39-9.99-7.57-20.68-3.79-32.17,5.81,0,11.55-.29,17.24.1,3.35.24,6.65,1.78,9.94,2.27,9.6,1.43,16.07,2.54,30.02,1.72l12.37.91c6.5-4.45,10.47-11.81,15.66-17.75,1.09-1.24,2.13-2.53,3.21-3.78l15.9-18.39c1.58-1.82,3.15-3.65,4.87-5.65,4.2,4.24,7.43,9.18,11.99,11.65,4.49,2.42,10.33,2.33,16.25,3.48Z" />


        <!-- Luna -->
        <path x-on:mouseover="isHovered = true" x-on:mouseout="isHovered = false"
            :class="{ 'cls-1': true, 'cls-1-hover': isHovered }" x-data="{ parameter: 'Luna', clicked: false }"
            @click.prevent="if (!clicked) { clicked = true; redirectToRoute(parameter, routesName); }" class="cls-1"
            d="m177.75,78.55c-7.49,7.58-15.2,15.07-22.53,22.91-4.08,4.37-7.39,9.46-11.33,13.98-2.64,3.04-5.77,5.66-8.68,8.46-2.06.01-4.13.02-6.19.02-10.19-1.15-20.41-2.15-30.57-3.52-7.99-1.08-15.95-2.46-23.82-4.14-1.15-.25-2.66-3.11-2.4-4.44.3-1.52,2.19-3.37,3.76-3.86,2.85-.89,5.99-.88,9-1.25.13-.52.25-1.04.37-1.56-1.39-1.07-2.86-2.07-4.17-3.24-1.94-1.74-5.32-3.59-5.33-5.42-.04-4.94.17-10.44,5.12-13.66,2.94-1.9,6.12-3.44,9.2-5.14,17.68-9.76,35.41-19.43,53.02-29.33,3.82-2.16,6.77-3.34,8.48,2.05.05.16.15.32.27.45,8.35,8.97,16.71,17.94,25.8,27.69Z" />

        <!-- Sto. tomas -->
        <path x-on:mouseover="isHovered = true" x-on:mouseout="isHovered = false"
            :class="{ 'cls-1': true, 'cls-1-hover': isHovered }" x-data="{ parameter: 'Santo Tomas', clicked: false }"
            @click.prevent="if (!clicked) { clicked = true; redirectToRoute(parameter, routesName); }" class="cls-1"
            d="m207.29,679.91c-.07,1.09-.71,2.15-1.08,3.22h-.01v.02c-.35.34-.7.7-1.04,1.04-.36.36-.73.72-1.1,1.08-.68.63-1.36,1.26-2.04,1.88-.17.54-.35,1.08-.52,1.62-.01,0-.04-.07-.05-.1v-.02c-4.29,3.49-8.99,6.59-12.76,10.56-5.91,6.23-12.75,10.72-20.73,13.61-5.47,1.38-10.91,2.85-16.42,4.04-.65.14-1.63-1.25-2.45-1.94h0s-.01-.02-.01-.03c-1.06-2.47-2.13-4.93-3.18-7.4-.34-.35-.7-.71-1.05-1.06-.35-.71-.72-1.42-1.07-2.13t-.01-.02c-.36-.35-.7-.69-1.04-1.04-.36-.71-.71-1.41-1.07-2.12.02,0,.03.02.05.04l-.06-.07s.01.02.01.03c-.4-.37-.81-.73-1.21-1.09-2.75-3.02-5.5-6.03-8.25-9.05-.37-.51-.75-1.02-1.13-1.53-.33-.33-.66-.67-.99-1-.02-.01-.05-.04-.07-.06-.33-.33-.65-.66-.98-.99-.02-.01-.04-.03-.06-.05l-.02-.02c-.43-.36-.88-.72-1.31-1.08-.24-.24-.48-.49-.72-.74-.38-.79-.74-1.6-1.12-2.4-.35-.36-.72-.72-1.07-1.07-.33-.34-.67-.68-1-1.01-.02-.02-.03-.03-.05-.05-.35-.35-.71-.71-1.06-1.06-.34-.34-.67-.67-1.01-1.01-.37-.36-.73-.73-1.1-1.1-.34-.34-.68-.68-1.03-1.03-.71-.35-1.42-.72-2.13-1.07t-.02-.01c-.34-.36-.7-.71-1.05-1.06-.45-.36-.88-.72-1.33-1.08-1.88-1.14-3.76-2.27-5.65-3.41-.59.24-1.19.47-1.78.71l2.64,21.18c-.27.16-.54.33-.81.49-2.17-3.82-4.33-7.64-6.5-11.46-.45-.37-.89-.74-1.34-1.1h-.01c-.35-.73-.72-1.44-1.08-2.16-.7-1.4-1.4-2.81-2.11-4.22t-.01-.02c-.35-.34-.67-.67-1.02-1.01t-.01-.02c-.35-.7-.7-1.39-1.05-2.1-.36-.72-.72-1.44-1.09-2.16l.03.04c-.36-.72-.72-1.44-1.08-2.16-.34-1.04-.7-2.1-1.05-3.15t.02.02l-.03-.06s.01.03.01.04c-1.65-2.01-2.19-3.8.94-4.92,3.35-4.15,6.54-8.45,10.16-12.35.86-.92,3.16-.5,4.79-.69,17.67.37,35.33.73,52.99,1.16.99.02,1.97.58,2.95.89,5.88,4.8,11.51,9.95,17.73,14.24,3.86,2.65,8.63,3.98,12.99,5.9q12.43.16,11.71,12.67Z" />

        <!-- Tubao -->
        <path x-on:mouseover="isHovered = true" x-on:mouseout="isHovered = false"
            :class="{ 'cls-1': true, 'cls-1-hover': isHovered }" x-data="{ parameter: 'Tubao', clicked: false }"
            @click.prevent="if (!clicked) { clicked = true; redirectToRoute(parameter, routesName); }" class="cls-1"
            d="m229.79,557.49c-.47,5.52-.93,11.06-1.39,16.58-2.11,1.42-4.22,2.84-6.33,4.26l.04-.05c-.34.32-.67.64-1,.96-3.57,2.15-7.13,4.3-10.7,6.44-1.03,1.07-2.08,2.14-3.12,3.21-.72.36-1.43.72-2.15,1.09l-2.07,2.07c-.34.35-.7.7-1.05,1.05h0c1.69,8.93,4.16,17.76,4.89,26.76,1.13,13.97,1.08,28.03,1.53,42.06-.31,1.24-.2,3.03-.99,3.63-3.28,2.5-16.5-.89-19.03-4.64-3.52-2.59-7.5-4.73-10.46-7.85-7.21-7.6-14.18-15.46-20.83-23.56-8.38-10.21-12.52-21.97-11.19-35.36,8.06-1.68,16.12-3.37,24.19-5.05,5.72-2.3,11.49-4.49,17.14-6.95,3.23-1.41,6.26-3.26,9.39-4.92,0,.01.02.02.03.03v-.06h0c0-.24,1.09-.47,1.07-.71.44-.03,0-.09.74-.8l.48-.42c10.49-5.74,9.84-5.8,15.13-8.31,2.78-1.33,5.38-3.02,8.06-4.55,1-.71,2-1.42,3-2.12l.09-.07s-.06.04-.09.06c.88-1.19,1.75-2.4,2.63-3.59.66.27,1.32.54,1.99.81Z" />

        <!-- Burgos -->
        <path x-on:mouseover="isHovered = true" x-on:mouseout="isHovered = false"
            :class="{ 'cls-1': true, 'cls-1-hover': isHovered }" x-data="{ parameter: 'Burgos', clicked: false }"
            @click.prevent="if (!clicked) { clicked = true; redirectToRoute(parameter, routesName); }" class="cls-1"
            d="m283.37,375.6c-7.18,8.37-12.74,15.82-19.36,22.17-4.17,4-10.07,6.14-14.92,9.51-3.69,2.58-7.65,5.26-10.25,8.81-7.76,10.55-14.85,21.59-22.32,32.36-3.28,4.73-.49,9.43-.28,14.15.14,3.43.4,6.85.61,10.28-.48.25-.96.51-1.44.77-2.58-2.61-5.68-4.89-7.63-7.91-2.87-4.45-4.92-9.44-7.34-14.18-2.88-5.63-6.03-11.13-8.53-16.92-.83-1.91-.81-5,.2-6.76,4.72-8.22,10.2-16,14.86-24.26,2.77-4.92,4.45-10.46,6.74-15.67.83-1.88,2.39-3.49,2.97-5.41,1.57-5.27,2.79-10.63,4.23-16.25,1.05.05,2.75.13,4.44.22,7.49,1.01,14.99,2.02,22.49,3.04,6.32,1,12.64,1.94,18.95,3.01,5.16.87,10.29,1.88,16.58,3.04Z" />

        <!-- Caba -->
        <path x-on:mouseover="isHovered = true" x-on:mouseout="isHovered = false"
            :class="{ 'cls-1': true, 'cls-1-hover': isHovered }" x-data="{ parameter: 'Caba', clicked: false }"
            @click.prevent="if (!clicked) { clicked = true; redirectToRoute(parameter, routesName); }" class="cls-1"
            d="m188.1,496.27c-.9,1.07-1.62,2.42-2.73,3.17-12.32,8.23-24.61,16.51-37.11,24.48-7.2,4.58-14.75,8.61-22.15,12.89h-1.65c-2.64-.66-5.26-1.77-7.92-1.9-10.5-.52-21.02-.65-31.51-1.17-1.33-.07-3.57-1.43-3.74-2.47-2.05-12.42-3.78-24.9-5.8-38.73h26.11c2.48-.03,4.97-.07,7.46-.11.25-.05.49-.02.72.08,2.31-.37,4.62-1.05,6.94-1.07,7.91-.07,15.83.09,23.75.17,9.63.01,19.26-.03,28.89.12,1.2.02,2.39,1.11,3.59,1.7,3.69.02,7.42-.21,11.07.19,1.44.16,2.72,1.73,4.08,2.65Z" />

        <!-- Pugo -->
        <path x-on:mouseover="isHovered = true" x-on:mouseout="isHovered = false"
            :class="{ 'cls-1': true, 'cls-1-hover': isHovered }" x-data="{ parameter: 'Pugo', clicked: false }"
            @click.prevent="if (!clicked) { clicked = true; redirectToRoute(parameter, routesName); }" class="cls-1"
            d="m257.87,708.41c-.17,1.69-.33,3.38-.49,5.07-1.47-.67-3.49-.95-4.32-2.09-3.52-4.87-6.69-9.99-9.99-15.01-.86-.67-2.11-1.16-2.52-2.03-2.76-5.81-5.34-11.7-7.98-17.57-1.05-1.4-2.1-2.82-3.16-4.23-1.04-1.43-2.09-2.84-3.14-4.27-2.98-4.38-7.55-2.86-11.63-3.15h-.02c-.87-.89-2.46-1.79-2.46-2.69,0-10.73.24-21.46.42-32.19-.62-1.88-1.25-3.76-1.87-5.64-1.03-6.96-2.3-13.9-3-20.89-.35-3.49.36-7.1.58-10.65h0c.7-.37,1.41-.73,2.12-1.09.35-.36.69-.7,1.05-1.05l-.04.02c.4-.65.8-1.3,1.19-1.95,4.6-2.85,9.19-5.7,13.79-8.55.41-.54.81-1.09,1.22-1.63.61,1.1,1.77,2.21,1.75,3.29-.12,5.22-.56,10.43-.89,15.64,3.49,4.23,7.89,8.02,10.23,12.81,2.77,5.66,4.18,12.1,5.42,18.35,2.7,13.68,4.94,27.46,7.33,41.2.24,1.38.2,2.81.29,4.22,2.04,11.36,4.08,22.72,6.12,34.08Z" />

        <!-- Agoo -->
        <path x-on:mouseover="isHovered = true" x-on:mouseout="isHovered = false"
            :class="{ 'cls-1': true, 'cls-1-hover': isHovered }" x-data="{ parameter: 'Agoo', clicked: false }"
            @click.prevent="if (!clicked) { clicked = true; redirectToRoute(parameter, routesName); }" class="cls-1"
            d="m157.53,638.77c-3.51-5.34-7.03-10.68-10.54-16.01-.35-1.07-.7-2.14-1.04-3.2t-.01-.02c-1.41-4.95-2.83-9.91-4.25-14.86v-3.11c-.05-4.69-2.26-6.61-6.68-4.68-5.39,2.35-10.61,2.64-16.12.39-2.89-1.17-5.98-2.15-9.06-2.44-5.58-.53-11.22-.49-16.83-.69-1.63.34-3.26.68-4.54.95,0,2.84.21,5.26-.04,7.63-.52,4.84-1.48,9.64-1.89,14.5-.53,6.15-.66,12.33-1.08,18.49-.05.77-.96,1.45-1.19,2.26-.27.95-.4,2.02-.29,3,.28,2.47.66,4.93,1.15,7.36s1.17,4.81,1.97,8.03c4.95-4.59,9.15-8.48,13.36-12.37,3.51-.71,7.02-2.01,10.53-2.02,8.9-.02,17.8.64,26.7.82,6.37.12,12.75-.04,19.12-.23.83-.03,1.64-.98,2.45-1.5-.57-.77-1.14-1.53-1.72-2.3Zm-42.14-20.41c-.17-.03-.35-.08-.53-.13.18.04.36.08.53.12h.01s-.01.01-.01.01Zm.06-.03h-.01s-.02.01-.03.01l.06-.06s0,.02,0,.03c0,0-.02.01-.03.02Z" />

        <!-- Bangar -->
        <path x-on:mouseover="isHovered = true" x-on:mouseout="isHovered = false"
            :class="{ 'cls-1': true, 'cls-1-hover': isHovered }" x-data="{ parameter: 'Bangar', clicked: false }"
            @click.prevent="if (!clicked) { clicked = true; redirectToRoute(parameter, routesName); }" class="cls-1"
            d="m218.92,66.8c-1.52,4.32-3.03,8.65-4.55,12.97-.96,1.66-1.9,3.32-2.86,4.97h0c-.36,1.06-.71,2.1-1.07,3.15-.01.02-.01.04-.02.06l.04-.06c-.09.52,0,1.2-.3,1.53-3.39,3.74-17.32,1.92-19.85-2.53-.01-.01-.01-.03-.02-.04-.34-.71-.69-1.4-1.04-2.11-4.57-4.93-9.15-9.86-13.73-14.79l-.05-.05c-4.42-4.92-8.84-9.84-13.26-14.76-2.47-2.76-5.21-5.34-7.28-8.38-.83-1.23-.95-4.17-.07-5.14,5.69-6.36,13.4-9.84,21.38-11.57,3.52-.76,7.91,2.3,11.86,3.75,3.51,1.29,6.41,2.62,10.74.77,3.58-1.53,8.54.1,12.88.5.66.06,1.64.91,1.79,1.56,2.22,9.27,4.35,18.57,6.39,27.88.15.66-.63,1.52-.98,2.29Z" />

        <!-- Bacnotan -->
        <path x-on:mouseover="isHovered = true" x-on:mouseout="isHovered = false"
            :class="{ 'cls-1': true, 'cls-1-hover': isHovered }" x-data="{ parameter: 'Bacnotan', clicked: false }"
            @click.prevent="if (!clicked) { clicked = true; redirectToRoute(parameter, routesName); }" class="cls-1"
            d="m169.54,194.55c-5.92,8.97-12.03,17.82-17.67,26.96-1.62,2.63-1.82,6.12-2.85,9.16-.87,2.55-1.38,4.79-5.07,5.73-8.47,2.17-17.02-.48-25.2,1.1-8.04,1.55-15.9.68-23.84.85-3.11.07-6.2.65-9.3.99h-6.17c0-5.46-.07-10.6.08-15.74.02-.67,1.18-1.3,1.81-1.95.62-1.56.82-3.98,1.94-4.52,3.77-1.81,2.84-4.31,1.99-7.22-.79-2.7-1.21-5.51-1.74-8.28-1.08-5.75-1.79-11.59-3.27-17.22-1.31-4.97-3.7-9.65-1.1-14.93.55-1.11.25-2.83-.1-4.15-2.16-8.28.95-12.99,9.59-14.38,5.39-.87,10.77-1.8,16.15-2.7,7.34.02,14.69.04,22.04.05,8.76,2.66,16.5,7.17,23.29,13.26,6.74,6.05,13.36,12.24,19.93,18.49,3.82,3.63,3.56,8.33-.51,14.5Z" />

        <!-- Rosario -->
        <path x-on:mouseover="isHovered = true" x-on:mouseout="isHovered = false"
            :class="{ 'cls-1': true, 'cls-1-hover': isHovered }" x-data="{ parameter: 'Rosario', clicked: false }"
            @click.prevent="if (!clicked) { clicked = true; redirectToRoute(parameter, routesName); }" class="cls-1"
            d="m260.15,730.49c-2.33,8.65-4.94,17.23-7.87,25.7-.53,1.55-2.95,3.44-4.52,3.46-11.44.21-22.89,0-34.33-.19-.77-.02-1.52-1.03-2.28-1.58-.38,0-.76-.03-1.14-.05-5.61.63-11.2,1.63-16.82,1.79-6.68.18-13.4-.14-20.06-.65-3.89-.31-7.72-1.43-11.58-2.18-1.12-2.56-2.32-5.08-3.34-7.68-2.16-5.55-4.29-11.11-6.31-16.7-1.17-3.22-2.36-6.48-2.9-9.83-.12-.73,2.49-1.91,3.85-2.88,4.45-1.25,8.95-2.37,13.35-3.79,4.43-1.41,8.75-3.12,13.13-4.69h.01c.96-.53,1.9-1.07,2.85-1.61,8.49-7.41,17.13-14.65,25.34-22.34,1.92-1.8,2.53-5.1,3.51-7.8.63-1.76.83-3.68,1.22-5.53.12-1.31.25-2.63.37-3.94h.01c3.85-.02,7.7-.04,11.55-.06l.25.03c.47.35.94.7,1.41,1.04h0c2.5,6.01,4.99,12,7.48,18l-.03-.04c2.37,4.49,4.75,8.99,7.12,13.48,2.64,3.39,5.28,6.79,7.93,10.17,3.09,3.42,6.19,6.83,9.29,10.24h.01c.35.72.7,1.42,1.05,2.13.53,1.84,1.88,3.91,1.45,5.5Z" />

        <!-- San Juan -->
        <path x-on:mouseover="isHovered = true" x-on:mouseout="isHovered = false"
            :class="{ 'cls-1': true, 'cls-1-hover': isHovered }" x-data="{ parameter: 'San Juan', clicked: false }"
            @click.prevent="if (!clicked) { clicked = true; redirectToRoute(parameter, routesName); }" class="cls-1"
            d="m159.08,283.13c-1.21,3.76-5.22,4.5-9.09,3.94-1.57.33-3.13.93-4.7.95-8.05.09-16.11.08-24.16-.01-1.21-.01-2.41-.62-3.62-.95-7.85-.37-15.71-.73-23.56-1.1-.62,0-1.23.01-1.85.01-1.89-.7-3.74-1.59-5.69-2.07-4.16-1.01-8.41-1.68-12.56-2.72-3.66-.91-6.56-1.36-9.54,2.35-1.91,2.38-5.9,3.09-8.96,4.54-.19,1.92-.38,3.85-.57,5.77-3.67-4.71-1.12-11.01,4.33-13.99,1.15-2.23,2.16-4.55,3.48-6.67,5.5-8.81,10.96-17.64,16.75-26.26,1.06-1.59,3.45-2.94,5.39-3.19,7.41-.97,14.88-1.61,22.34-2.04,2.91-.16,5.88.91,8.79.79,10.29-.42,20.56-1.12,31.61-1.75.45,2.39,1.17,4.67,1.25,6.98.24,7.26.24,14.52.34,21.79.04,3.06.53,5.53,4.07,6.86,2.95,1.11,7.3,2.56,5.95,6.77Z" />

        <line class="cls-1" x1="196.66" y1="577.22" x2="196.69" y2="577.18" />

        <text class="cls-2" transform="translate(66.13 333.93)">
            <tspan x="0" y="0">SAN FERNANDO</tspan>
        </text>
        <text class="cls-2" transform="translate(215.28 338.35)">
            <tspan x="0" y="0">BAGULIN</tspan>
        </text>
        <text class="cls-2" transform="translate(76.44 432.98)">
            <tspan x="0" y="0">BAUANG</tspan>
        </text>
        <text class="cls-2" transform="translate(142.17 411.94)">
            <tspan x="0" y="0">NAGUILIAN</tspan>
        </text>
        <text class="cls-2" transform="translate(211.75 404.22)">
            <tspan x="0" y="0">BURGOS</tspan>
        </text>
        <text class="cls-2" transform="translate(110.77 514.11)">
            <tspan x="0" y="0">CABA</tspan>
        </text>
        <text class="cls-2" transform="translate(133.39 560.21)">
            <tspan x="0" y="0">ARINGAY</tspan>
        </text>
        <text class="cls-2" transform="translate(100.88 623.71)">
            <tspan x="0" y="0">AGOO</tspan>
        </text>
        <text class="cls-2" transform="translate(163.45 623.71)">
            <tspan x="0" y="0">TUBAO</tspan>
        </text>
        <text class="cls-2" transform="translate(217.88 651.49)">
            <tspan x="0" y="0">PUGO</tspan>
        </text>
        <text class="cls-2" transform="translate(124.69 675.76)">
            <tspan x="0" y="0">STO. TOMAS</tspan>
        </text>
        <text class="cls-2" transform="translate(184.02 732.75)">
            <tspan x="0" y="0">ROSARIO</tspan>
        </text>
        <text class="cls-2" transform="translate(204.83 267.28)">
            <tspan x="0" y="0">SAN GABRIEL</tspan>
        </text>
        <text class="cls-2" transform="translate(88.54 268.43)">
            <tspan x="0" y="0">SAN JUAN</tspan>
        </text>
        <text class="cls-2" transform="translate(94.88 194.79)">
            <tspan x="0" y="0">BACNOTAN</tspan>
        </text>
        <text class="cls-2" transform="translate(228.49 173.66)">
            <tspan x="0" y="0">SANTOL</tspan>
        </text>
        <text class="cls-2" transform="translate(125.37 138.72)">
            <tspan x="0" y="0">BALAOAN</tspan>
        </text>
        <text class="cls-2" transform="translate(222.93 84.43)">
            <tspan x="0" y="0">SUDIPEN</tspan>
        </text>
        <text class="cls-2" transform="translate(109.21 93.73)">
            <tspan x="0" y="0">LUNA</tspan>
        </text>
        <text class="cls-2" transform="translate(171.25 60.24)">
            <tspan x="0" y="0">BANGAR</tspan>
        </text>

    </svg>
</div>

<script>
    // Access the routeName attribute from the div
    const routesName = document.querySelector('#routeNamesss').getAttribute('data-route-name');

    // console.log('Route Name:', routesName); // Add this line to check the value

    function redirectToRoute(parameter, routesName) {
        let url;
        console.log('routes name is this', routesName);
        // Use a switch statement to handle different route names
        switch (routesName) {
            case 'destinations.show':
                url = `{{ route('destinations.show', ':parameter') }}`;
                break;
            
            default:
                console.error('Invalid route name:', routesName);
                return;
        }

        // Replace ':parameter' with the actual parameter value
        url = url.replace(':parameter', parameter);

        // Check if the URL is constructed correctly
        if (url) {
            window.location.href = url;
            console.log('Redirected to:', url);
        } else {
            console.error('Invalid route or parameter.');
        }
    }

    window.Alpine.directive('redirectToRoute', (el, binding) => {
        el.addEventListener('click', () => {
            redirectToRoute(binding.value, routesName); // Change routeName to routesName
        });
    });
</script>