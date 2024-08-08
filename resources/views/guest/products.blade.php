@extends('guest.layouts.main')
@section('content')

    <head>
        <title>{{ $setting[0]->app_name }}</title>
        <meta data-n-head="ssr" charset="utf-8">
        <meta data-n-head="ssr" name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=5.0">
        <link rel="stylesheet" href="{{ asset('assets/styles/vendor/toastr.css') }}">
        <!-- Favicon icon -->
        <link rel=icon href={{ asset('images/' . $settings->logo) }}>
        <style
            data-vue-ssr-id="603044f4:0 603044f4:1 4f857918:0 86684824:0 3191d5ad:0 375b3626:0 2643d6a7:0 5affea6a:0 909a53cc:0 1d03469e:0 b79c7282:0 1d84633f:0 9b2027fa:0 7b65197a:0 191ad00a:0 5eba30e5:0">
            @import url(https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600&display=swap);

            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
            html {
                line-height: 1.15;
                -webkit-text-size-adjust: 100%
            }

            body {
                margin: 0
            }

            main {
                display: block
            }

            h1 {
                font-size: 2em;
                margin: .67em 0
            }

            hr {
                box-sizing: content-box;
                height: 0;
                overflow: visible
            }

            pre {
                font-family: monospace, monospace;
                font-size: 1em
            }

            a {
                background-color: transparent
            }

            abbr[title] {
                border-bottom: none;
                text-decoration: underline;
                -webkit-text-decoration: underline dotted;
                text-decoration: underline dotted
            }

            b,
            strong {
                font-weight: bolder
            }

            code,
            kbd,
            samp {
                font-family: monospace, monospace;
                font-size: 1em
            }

            small {
                font-size: 80%
            }

            sub,
            sup {
                font-size: 75%;
                line-height: 0;
                position: relative;
                vertical-align: baseline
            }

            sub {
                bottom: -.25em
            }

            sup {
                top: -.5em
            }

            img {
                border-style: none
            }

            button,
            input,
            optgroup,
            select,
            textarea {
                font-family: inherit;
                font-size: 100%;
                line-height: 1.15;
                margin: 0
            }

            button,
            input {
                overflow: visible
            }

            button,
            select {
                text-transform: none
            }

            [type=button],
            [type=reset],
            [type=submit],
            button {
                -webkit-appearance: button
            }

            [type=button]::-moz-focus-inner,
            [type=reset]::-moz-focus-inner,
            [type=submit]::-moz-focus-inner,
            button::-moz-focus-inner {
                border-style: none;
                padding: 0
            }

            [type=button]:-moz-focusring,
            [type=reset]:-moz-focusring,
            [type=submit]:-moz-focusring,
            button:-moz-focusring {
                outline: 1px dotted ButtonText
            }

            fieldset {
                padding: .35em .75em .625em
            }

            legend {
                box-sizing: border-box;
                color: inherit;
                display: table;
                max-width: 100%;
                padding: 0;
                white-space: normal
            }

            progress {
                vertical-align: baseline
            }

            textarea {
                overflow: auto
            }

            [type=checkbox],
            [type=radio] {
                box-sizing: border-box;
                padding: 0
            }

            [type=number]::-webkit-inner-spin-button,
            [type=number]::-webkit-outer-spin-button {
                height: auto
            }

            [type=search] {
                -webkit-appearance: textfield;
                outline-offset: -2px
            }

            [type=search]::-webkit-search-decoration {
                -webkit-appearance: none
            }

            ::-webkit-file-upload-button {
                -webkit-appearance: button;
                font: inherit
            }

            details {
                display: block
            }

            summary {
                display: list-item
            }

            [hidden],
            template {
                display: none
            }

            :root {
                --tw-ring-offset-shadow: 0 0 transparent;
                --tw-ring-shadow: 0 0 transparent;
                --shadow-0: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), 0 1px 2px 0 rgba(0, 0, 0, 0.05);
                --shadow-0-top: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), 0 -1px 2px 0 rgba(0, 0, 0, 0.05);
                --shadow-1: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
                --shadow-1-top: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), 0 -1px 3px 0 rgba(0, 0, 0, 0.1), 0 -1px 2px 0 rgba(0, 0, 0, 0.06);
                --shadow-2: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
                --shadow-2-top: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), 0 -4px 6px -1px rgba(0, 0, 0, 0.1), 0 -2px 4px -1px rgba(0, 0, 0, 0.06);
                --shadow-3: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
                --shadow-4: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
                --shadow-5: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), 0 25px 50px -12px rgba(0, 0, 0, 0.25);
                --shadow-in: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), inset 0 2px 4px 0 rgba(0, 0, 0, 0.06);
                --shadow-out: var(--tw-ring-offset-shadow), var(--tw-ring-shadow);
                --shadow-white: 0 0 18px -6px rgb(0 0 0/16%), 0 2px 4px 0 rgb(0 0 0/6%)
            }

            ::-moz-selection {
                background: #ff9a76 !important;
                background: var(--color-primary-1) !important;
                color: #fff !important;
                color: var(--color-white) !important
            }

            ::selection {
                background: #ff9a76 !important;
                background: var(--color-primary-1) !important;
                color: #fff !important;
                color: var(--color-white) !important
            }

            :root {
                --color-white: #fff;
                --color-black: #000;
                --color-red: #ff5722;
                --color-warning: #ff9800;
                --color-primary: #f7906c;
                --color-primary-1: #ff9a76;
                --color-primary-4: #fde8db;
                --color-primary-5: #fff3eb;
                --color-text: #4c4c4c;
                --color-gray-text: #bababa;
                --color-gray-stroke: #d2d2d2;
                --color-gray-hover: #f2f2f2;
                --color-gray-bg: #fafafa;
                --radius-sx: 4px;
                --radius-s: 6px;
                --radius-sm: 8px;
                --radius-md: 16px;
                --radius-lg: 20px;
                --radius-xl: 26px;
                --shadow-regular: 0 0.0625rem 0.375rem rgba(0, 0, 0, 0.2);
                --shadow-light: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.05);
                --color-primary-100: #f3f1ef;
                --color-gray-100: #f7f8fa;
                --color-gray-200: #f3f3f3;
                --color-gray-300: #dcdcdc;
                --color-gray-400: #989898;
                --color-gray-500: #676767;
                --color-gray-firm: #423c3c;
                --max-content-width: 560px
            }

            *,
            :after,
            :before {
                box-sizing: border-box
            }

            body,
            html {
                color: #4c4c4c;
                color: var(--color-text);
                font-family: "Rubik", sans-serif;
                line-height: 1.4
            }

            body {
                overflow-x: hidden;
                min-height: 100%;
                position: relative;
                -webkit-tap-highlight-color: transparent;
                -webkit-touch-callout: none;
                -webkit-text-size-adjust: 100%;
                -ms-text-size-adjust: 100%;
                -moz-osx-font-smoothing: grayscale;
                -webkit-font-smoothing: antialiased;
                touch-action: manipulation;
                scrollbar-color: #d2d2d2 #fafafa;
                scrollbar-color: var(--color-gray-stroke) var(--color-gray-bg);
                scrollbar-width: thin
            }

            body::-webkit-scrollbar {
                height: 10px;
                width: 10px
            }

            body::-webkit-scrollbar-track {
                width: 10px;
                background: #fafafa;
                background: var(--color-gray-bg)
            }

            body::-webkit-scrollbar-thumb {
                width: 10px;
                background: #d2d2d2;
                background: var(--color-gray-stroke);
                border-radius: 8px
            }

            body.body-overflow-hidden {
                overflow: hidden
            }

            html.mvc__a.mvc__lot.mvc__of.mvc__classes.mvc__to.mvc__increase.mvc__the.mvc__odds.mvc__of.mvc__winning.mvc__specificity,
            html.mvc__a.mvc__lot.mvc__of.mvc__classes.mvc__to.mvc__increase.mvc__the.mvc__odds.mvc__of.mvc__winning.mvc__specificity>body {
                position: static !important
            }

            img {
                max-width: 100%
            }

            pre {
                overflow-x: auto
            }

            textarea {
                resize: none
            }

            input,
            textarea {
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none
            }

            input,
            select,
            textarea {
                color: #4c4c4c;
                color: var(--color-text);
                font-family: "Rubik", Arial, sans-serif
            }

            select:focus {
                outline: none
            }

            button {
                cursor: pointer
            }

            button:focus {
                outline: none
            }

            button.focus-visible,
            button:focus-visible {
                box-shadow: 0 0 0 2px #00f, 0 0 0 4px #fff
            }

            a {
                text-decoration: none;
                color: unset
            }

            p {
                line-height: 1.45
            }

            .link {
                color: #f7906c;
                color: var(--color-primary)
            }

            .link:hover {
                color: #ff9a76;
                color: var(--color-primary-1)
            }

            #__layout {
                min-height: 100vh;
                background: #fafafa;
                background: var(--color-gray-bg);
                display: flex;
                flex-direction: column
            }

            .wrapper {
                max-width: 890px;
                margin: 0 auto;
                padding: 0 16px
            }

            .panel-wr,
            .wrapper {
                width: 100%
            }

            .h2 {
                text-transform: uppercase;
                font-size: 20px;
                font-weight: 400;
                margin: 32px 0 18px
            }

            .application {
                background: #fafafa;
                background: var(--color-gray-bg);
                display: flex;
                flex-direction: column;
                min-height: 100vh
            }

            .base-scrollbar {
                overflow-y: auto;
                position: relative;
                height: 100%;
                scrollbar-color: #bababa #fafafa;
                scrollbar-color: var(--color-gray-text) var(--color-gray-bg);
                scrollbar-width: thin
            }

            .base-scrollbar::-webkit-scrollbar {
                height: 4px;
                width: 4px
            }

            .base-scrollbar::-webkit-scrollbar-track {
                width: 4px;
                background: #fafafa;
                background: var(--color-gray-bg)
            }

            .base-scrollbar::-webkit-scrollbar-thumb {
                width: 4px;
                background: #bababa;
                background: var(--color-gray-text);
                border-radius: 2px
            }

            .right-fade:after {
                content: "";
                position: absolute;
                right: 0;
                top: 0;
                height: calc(100% - 4px);
                width: 40px;
                pointer-events: none;
                background: linear-gradient(90deg, #fff, hsla(0, 0%, 100%, 0) 0, #fff);
                background: linear-gradient(90deg, var(--color-white), hsla(0, 0%, 100%, 0) 0, var(--color-white))
            }

            html[dir=rtl] .right-fade:after {
                right: auto;
                left: 0;
                transform: rotateY(180deg)
            }

            .text-dot {
                text-overflow: ellipsis;
                white-space: nowrap
            }

            .overflow-hidden,
            .text-dot {
                overflow: hidden
            }

            .visible-hidden {
                clip: rect(1px, 1px, 1px, 1px);
                height: 1px;
                overflow: hidden;
                position: absolute;
                white-space: nowrap;
                width: 1px;
                margin: -1px;
                border: 0;
                padding: 0
            }

            .visible-hidden:focus {
                clip: auto;
                height: auto;
                overflow: auto;
                position: absolute;
                width: auto;
                margin: 0
            }

            .focus:focus,
            a:focus {
                outline: none
            }

            .focus.focus-visible,
            .focus:focus-visible,
            a.focus-visible,
            a:focus-visible {
                box-shadow: 0 0 0 4px rgba(255, 163, 131, .64) !important
            }

            .card {
                border-radius: 20px;
                border-radius: var(--radius-lg);
                background: #fff;
                background: var(--color-white);
                box-shadow: 0 0 transparent, 0 0 transparent, 0 1px 2px 0 rgba(0, 0, 0, .05);
                box-shadow: var(--shadow-0)
            }

            .modal-enter-active,
            .modal-leave-active {
                transition: opacity .2s
            }

            .modal-enter-active .base-modal__main,
            .modal-leave-active .base-modal__main {
                transition: transform .2s
            }

            .modal-enter,
            .modal-leave-to {
                opacity: 0
            }

            .modal-enter .base-modal__main,
            .modal-leave-to .base-modal__main {
                transform: scale(.97) translateY(-10px)
            }

            @keyframes placeHolderShimmer {
                0% {
                    background-position: -468px 0
                }

                to {
                    background-position: 468px 0
                }
            }

            .phone-frame {
                position: relative;
                flex-shrink: 0;
                align-self: center;
                max-width: 320px;
                display: flex;
                border-radius: 38px;
                overflow: hidden;
                box-shadow: 0 0 2px 2px #c8cacb, 0 0 0 6px #e2e3e4, 0 0 transparent, 0 0 transparent, 0 10px 15px -3px rgba(0, 0, 0, .1), 0 4px 6px -2px rgba(0, 0, 0, .05);
                box-shadow: 0 0 2px 2px #c8cacb, 0 0 0 6px #e2e3e4, var(--shadow-3);
                border: 10px solid #4c4c4c;
                border: 10px solid var(--color-text)
            }

            .phone-frame:before {
                z-index: 1;
                top: 0;
                height: 22px;
                width: 50%;
                border-radius: 0 0 20px 20px;
                background: #4c4c4c;
                background: var(--color-text)
            }

            .phone-frame:after,
            .phone-frame:before {
                content: "";
                position: absolute;
                left: 50%;
                transform: translateX(-50%)
            }

            .phone-frame:after {
                z-index: 2;
                top: 6px;
                height: 4px;
                width: 24%;
                border-radius: 2px;
                background: #4a4a4a
            }

            .phone-frame img {
                -o-object-fit: contain;
                object-fit: contain;
                height: 100%
            }

            .tooltip {
                display: block !important;
                z-index: 10000
            }

            .tooltip .tooltip-inner {
                background: #000;
                color: #fff;
                border-radius: 4px;
                font-size: 12px;
                padding: 5px 10px 4px
            }

            .tooltip .tooltip-arrow {
                width: 0;
                height: 0;
                border-style: solid;
                position: absolute;
                margin: 5px;
                border-color: #000;
                z-index: 1
            }

            .tooltip[x-placement^=top] {
                margin-bottom: 5px
            }

            .tooltip[x-placement^=top] .tooltip-arrow {
                border-width: 5px 5px 0;
                border-left-color: transparent !important;
                border-right-color: transparent !important;
                border-bottom-color: transparent !important;
                bottom: -5px;
                left: calc(50% - 5px);
                margin-top: 0;
                margin-bottom: 0
            }

            .tooltip[x-placement^=bottom] {
                margin-top: 5px
            }

            .tooltip[x-placement^=bottom] .tooltip-arrow {
                border-width: 0 5px 5px;
                border-left-color: transparent !important;
                border-right-color: transparent !important;
                border-top-color: transparent !important;
                top: -5px;
                left: calc(50% - 5px);
                margin-top: 0;
                margin-bottom: 0
            }

            .tooltip[x-placement^=right] {
                margin-left: 5px
            }

            .tooltip[x-placement^=right] .tooltip-arrow {
                border-width: 5px 5px 5px 0;
                border-left-color: transparent !important;
                border-top-color: transparent !important;
                border-bottom-color: transparent !important;
                left: -5px;
                top: calc(50% - 5px);
                margin-left: 0;
                margin-right: 0
            }

            .tooltip[x-placement^=left] {
                margin-right: 5px
            }

            .tooltip[x-placement^=left] .tooltip-arrow {
                border-width: 5px 0 5px 5px;
                border-top-color: transparent !important;
                border-right-color: transparent !important;
                border-bottom-color: transparent !important;
                right: -5px;
                top: calc(50% - 5px);
                margin-left: 0;
                margin-right: 0
            }

            .tooltip.popover .popover-inner {
                background: #fafafa;
                background: var(--color-gray-bg);
                color: #000;
                padding: 8px;
                border-radius: 5px;
                box-shadow: 0 5px 16px rgba(0, 0, 0, .2)
            }

            .tooltip.popover .popover-arrow {
                border-color: #fafafa;
                border-color: var(--color-gray-bg)
            }

            .tooltip[aria-hidden=true] {
                visibility: hidden;
                opacity: 0;
                transition: opacity .15s, visibility .15s
            }

            .tooltip[aria-hidden=false] {
                visibility: visible;
                opacity: 1;
                transition: opacity .15s
            }

            .ripple:after {
                content: "";
                position: absolute;
                top: 50%;
                left: 50%;
                margin: -35px 0 0 -35px;
                width: 70px;
                height: 70px;
                border-radius: 50%;
                opacity: 0;
                pointer-events: none;
                background: #f7906c;
                background: var(--color-primary)
            }

            .ripple._clicked:after {
                animation: anim-effect-boris .35s forwards
            }

            @keyframes anim-effect-boris {
                0% {
                    transform: scale3d(.3, .3, 1)
                }

                25%,
                50% {
                    opacity: .08
                }

                to {
                    opacity: 0;
                    transform: scale3d(1.2, 1.2, 1)
                }
            }

            ._expand-clickable:before {
                content: "";
                position: absolute;
                top: 50%;
                left: 50%;
                margin: -30px 0 0 -30px;
                width: 60px;
                height: 60px;
                border-radius: 50%;
                opacity: 0
            }

            .nuxt-progress {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                height: 2px;
                width: 0;
                opacity: 1;
                transition: width .1s, opacity .4s;
                background-color: #ff9a76;
                z-index: 999999
            }

            .nuxt-progress.nuxt-progress-notransition {
                transition: none
            }

            .nuxt-progress-failed {
                background-color: red
            }

            .place {
                flex-grow: 1;
                display: flex;
                flex-direction: column;
                color: var(--color-text)
            }

            .place._theme-dark {
                --color-white: #181818;
                --color-black: #dedede;
                --color-red: #df7554;
                --color-text: #c9c9c9;
                --color-gray-text: #676767;
                --color-gray-stroke: #525252;
                --color-gray-100: #272727;
                --color-primary-100: #272727;
                --color-gray-200: #252424;
                --color-gray-300: #161616;
                --color-gray-hover: #252424;
                --color-gray-bg: #1e1e1e;
                --shadow-regular: 0 0.0625rem 0.375rem hsla(0, 0%, 100%, 0.2);
                --shadow-light: 0 0.125rem 0.25rem hsla(0, 0%, 100%, 0.05)
            }

            .place .focus.focus-visible,
            .place .focus:focus-visible,
            .place a.focus-visible,
            .place a:focus-visible {
                box-shadow: 0 0 0 4px var(--color-primary-4) !important
            }

            .place .wrapper {
                width: 100%;
                max-width: var(--max-content-width)
            }

            .place-body {
                display: flex;
                flex-direction: column;
                flex-grow: 1;
                background: var(--color-primary-100)
            }

            .place-header {
                overflow: hidden;
                height: 162px;
                position: relative
            }

            .place-header__close-panel-btn {
                position: fixed;
                z-index: 100;
                transform: translate(-4px, 12px)
            }

            html[dir=rtl] .place-header__close-panel-btn {
                transform: translate(4px, 12px)
            }

            .place-header__close-panel-btn .close-panel-button {
                background: var(--color-white);
                border-radius: 100%;
                box-shadow: var(--shadow-2)
            }

            .place-header__main {
                height: 100%;
                position: relative;
                display: flex;
                align-items: center;
                justify-content: center
            }

            .place-header__bg {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                background-size: cover;
                background-position: 50%
            }

            .place-header__logo {
                display: flex;
                padding: 18px;
                background: var(--color-white);
                margin-top: -42px;
                position: relative;
                border-radius: 100%;
                width: 82px;
                height: 82px;
                overflow: hidden;
                box-shadow: var(--shadow-2)
            }

            .place-header__logo._logo {
                padding: 0;
                background: transparent
            }

            .place-header__logo img {
                max-height: 100%;
                -o-object-fit: cover;
                object-fit: cover
            }

            .place-header__actions {
                display: flex;
                align-items: center;
                position: absolute;
                z-index: 2;
                right: 0;
                bottom: 42px;
                grid-gap: 0 8px;
                gap: 0 8px
            }

            html[dir=rtl] .place-header__actions {
                right: auto;
                left: 16px
            }

            .place-header__actions__button {
                text-shadow: 0 2px 3px rgba(0, 0, 0, .46);
                color: var(--color-white)
            }

            .place-content {
                display: flex;
                flex-direction: column;
                overflow: hidden;
                flex-grow: 1;
                position: relative;
                padding-top: 24px;
                padding-bottom: 0;
                background: var(--color-white);
                border-radius: 24px 24px 0 0;
                margin-top: -32px;
                box-shadow: var(--shadow-0)
            }

            .place-content__footer {
                font-size: 12px;
                margin-top: auto;
                padding-bottom: 16px;
                padding-top: 16px;
                text-align: center;
                color: var(--color-gray-text)
            }

            .place-title {
                margin: 0 0 4px;
                font-weight: 400;
                color: var(--color-black)
            }

            .place-title__actions .icon-button {
                color: var(--color-text)
            }

            html[dir=rtl] .place-title__actions .icon-button {
                transform: rotateY(180deg)
            }

            .place-info {
                margin-bottom: 8px;
                font-size: 14px;
                color: var(--color-gray-500);
                margin-top: 4px
            }

            .place-info__address {
                display: flex;
                align-items: flex-start;
                flex-wrap: wrap
            }

            .place-info__block {
                display: flex;
                align-items: flex-start;
                margin-bottom: 8px
            }

            .place-info__block:not(:last-child) {
                margin-right: 12px
            }

            .place-info__block svg {
                flex-shrink: 0;
                margin-right: 4px
            }

            .place-info__description {
                display: flex;
                flex-direction: column;
                grid-gap: 8px 0;
                gap: 8px 0
            }

            .place-info__description p {
                margin: 0
            }

            .place-order {
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
                display: flex;
                align-items: center;
                justify-content: center;
                width: 100%;
                z-index: 100;
                position: fixed;
                max-width: 560px;
                transform: translateX(-50%);
                left: 50%;
                bottom: 0;
                height: 54px;
                color: var(--color-white);
                font-weight: 500;
                background: var(--color-primary);
                border: none;
                border-radius: var(--radius-xl) var(--radius-xl) 0 0
            }

            .place._admin .place-content {
                padding-bottom: 64px
            }

            .place._admin .place-order {
                bottom: 56px
            }

            .locale-switcher {
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                border: 2px solid var(--color-white);
                border-radius: var(--radius-s);
                padding: 2px 22px 2px 6px;
                box-shadow: var(--shadow-2);
                text-transform: capitalize;
                background: var(--color-white) url("data:image/svg+xml;charset=utf-8,%3Csvg width='10' height='5' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M5.054 4.612a.447.447 0 00.268-.114L8.897 1.28A.447.447 0 108.3.615l-3.277 2.95L1.746.615a.447.447 0 10-.598.665l3.576 3.218a.447.447 0 00.33.114z' fill='%23423c3c' stroke='%23423c3c' stroke-width='.4'/%3E%3C/svg%3E") no-repeat calc(100% - 8px) 9px;
                background-size: 12px
            }

            html[dir=rtl] .locale-switcher {
                background: var(--color-white) url("data:image/svg+xml;charset=utf-8,%3Csvg width='10' height='5' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M5.054 4.612a.447.447 0 00.268-.114L8.897 1.28A.447.447 0 108.3.615l-3.277 2.95L1.746.615a.447.447 0 10-.598.665l3.576 3.218a.447.447 0 00.33.114z' fill='%23423c3c' stroke='%23423c3c' stroke-width='.4'/%3E%3C/svg%3E") no-repeat 8px 9px;
                background-size: 12px;
                padding-left: 22px;
                padding-right: 6px
            }

            .locale-switcher option {
                text-transform: capitalize
            }

            .locale-switcher._dark {
                background-color: transparent;
                background-position: calc(100% - 8px) 8px;
                box-shadow: none;
                color: var(--color-text);
                border-color: var(--color-text)
            }

            .locale-switcher-prefixed {
                display: flex;
                align-items: center;
                height: 30px;
                min-width: 148px;
                border-radius: var(--radius-s);
                background-color: var(--color-gray-200)
            }

            .locale-switcher-prefixed__icon {
                margin: 0 6px
            }

            .locale-switcher-prefixed__select {
                flex: 1;
                height: 100%;
                padding: 6px 8px 6px 10px;
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                border: none;
                border-radius: 0 var(--radius-s) var(--radius-s) 0;
                background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg width='10' height='5' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M5.054 4.612a.447.447 0 00.268-.114L8.897 1.28A.447.447 0 108.3.615l-3.277 2.95L1.746.615a.447.447 0 10-.598.665l3.576 3.218a.447.447 0 00.33.114z' fill='%23536581' stroke='%23536581' stroke-width='.4'/%3E%3C/svg%3E");
                background-color: var(--color-gray-200);
                background-repeat: no-repeat;
                background-position: calc(100% - 8px) 12px;
                background-size: 12px
            }

            .locale-switcher-prefixed__divider {
                width: 1px;
                height: 20px;
                background-color: var(--color-gray-300)
            }

            .cafe-list {
                padding-bottom: 24px
            }

            .menu-list {
                position: relative
            }

            .menu-list .base-scrollbar {
                position: relative;
                display: flex;
                align-items: center;
                overflow-x: auto;
                padding: 4px 22px 16px 0;
                grid-gap: 0 8px;
                gap: 0 8px
            }

            ._admin .menu-list .base-scrollbar {
                padding-bottom: 40px
            }

            html[dir=rtl] .menu-list .base-scrollbar {
                padding-left: 22px;
                padding-right: 0
            }

            .menu-list__item .admin-item-add-button {
                width: 24px;
                height: 24px
            }

            .menu-list__item .admin-item-add-button svg {
                width: 16px;
                height: 16px
            }

            .menu {
                display: flex;
                align-items: center;
                border-radius: 32px;
                position: relative;
                justify-content: center
            }

            .menu:not(:last-child) {
                margin-right: 10px
            }

            .menu__button {
                cursor: pointer;
                background: var(--color-white);
                border: 3px solid var(--color-primary);
                border-radius: 32px;
                padding: 5px 10px 4px;
                color: var(--color-primary);
                font-weight: 600;
                white-space: nowrap;
                transition: background .25s, color .25s;
                display: flex;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
                align-items: center
            }

            ._selected .menu__button,
            .menu__button:hover {
                background: var(--color-primary);
                color: var(--color-white)
            }

            ._not-visible .menu__button {
                opacity: .4
            }

            .menu._admin .menu__button {
                text-align: center;
                justify-content: center;
                min-width: 86px
            }

            .menu-item-search {
                display: flex;
                flex-direction: column
            }

            .menu-item-search-result {
                padding-bottom: 24px;
                margin-bottom: 32px;
                border-bottom: 1px solid var(--color-gray-hover)
            }

            .menu-item-search-result__empty {
                color: var(--color-gray-text)
            }

            .menu-item-search-result .h2 {
                margin-top: 0
            }

            .menu-item-search-result p {
                margin: 0
            }

            .menu-item-search-result .menu-item:not(:last-child) {
                margin-bottom: 56px
            }

            .menu-item-search-form {
                width: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
                position: relative;
                height: 64px;
                margin-bottom: 16px
            }

            .menu-item-search-form .menu-item-search-form-button {
                position: absolute;
                top: 4px;
                right: 6px;
                border-radius: 100%;
                padding: 8px;
                box-shadow: var(--shadow-1);
                transition: box-shadow .25s
            }

            .menu-item-search-form .menu-item-search-form-button:active {
                box-shadow: var(--shadow-0)
            }

            html[dir=rtl] .menu-item-search-form .menu-item-search-form-button {
                right: auto;
                left: 6px
            }

            .menu-item-search-form-field {
                position: relative;
                flex-grow: 1
            }

            .menu-item-search-form .base-form-input {
                border-radius: 32px
            }

            .menu-item-search-form .base-form-input:focus {
                box-shadow: none !important;
                border-color: transparent !important
            }

            .menu-item-search-form .base-form-input::-moz-placeholder {
                font-size: 14px;
                color: var(--color-gray-text)
            }

            .menu-item-search-form .base-form-input::placeholder {
                font-size: 14px;
                color: var(--color-gray-text)
            }

            .base-form-input {
                display: flex;
                flex-wrap: nowrap;
                align-items: center;
                grid-gap: 8px;
                gap: 8px;
                width: 100%;
                background-color: var(--color-gray-200);
                border-radius: var(--radius-sm);
                line-height: 1;
                box-sizing: border-box;
                outline: none;
                border: 2px solid transparent;
                transition: all .3s;
                color: var(--color-gray-firm);
                cursor: text
            }

            .base-form-input:focus {
                border-color: var(--color-gray-400)
            }

            .base-form-input::-moz-placeholder {
                font-size: 14px;
                color: var(--color-gray-400)
            }

            .base-form-input::placeholder {
                font-size: 14px;
                color: var(--color-gray-400)
            }

            .base-form-input:disabled {
                color: var(--color-gray-400);
                background-color: var(--color-gray-300)
            }

            .base-form-input-prefix {
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
                font-size: 12px;
                color: var(--color-gray-400);
                border-right: 1px solid var(--color-gray-300);
                padding-right: 8px;
                display: flex;
                align-items: center;
                line-height: 1;
                width: 25px;
                overflow: hidden
            }

            .base-form-input-input {
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                width: 100%;
                background: transparent;
                border: none;
                padding: 0;
                line-height: 1
            }

            .base-form-input--textarea .base-form-input-input {
                resize: none;
                line-height: 1.4
            }

            .base-form-input-input:focus {
                outline: none
            }

            .base-form-input[type=color] {
                padding: 4px 8px;
                height: 40px
            }

            .base-form-input--regular {
                font-size: 14px;
                padding: 10px 14px
            }

            .base-form-input--small {
                font-size: 12px;
                padding: 6px 10px
            }

            .base-form-input--textarea {
                align-items: flex-start
            }

            .round-button {
                position: relative;
                border: none;
                background: var(--color-white);
                border-radius: 100%;
                padding: 10px;
                display: flex;
                align-items: center;
                justify-content: center;
                box-shadow: 1px 1px 6px rgba(0, 0, 0, .18)
            }

            .round-button svg {
                width: 20px;
                height: 20px
            }

            .round-button:after {
                background: hsla(0, 0%, 100%, .2)
            }

            .category-list {
                display: flex;
                flex-direction: column
            }

            .category-list>.h2 {
                text-align: center;
                margin: 0 0 16px
            }

            .category-list__item:not(:last-child) {
                margin-bottom: 16px
            }

            .category-item {
                position: relative;
                width: 100%;
                aspect-ratio: 3/1;
                overflow: hidden
            }

            .category-item__link {
                display: flex;
                align-items: center;
                justify-content: center;
                text-align: center;
                padding: 16px;
                width: 100%;
                height: 100%;
                color: #fff;
                border-radius: 26px;
                text-shadow: 0 2px 3px rgba(0, 0, 0, .46);
                box-shadow: var(--shadow-1);
                background-size: cover;
                background-position: 50%;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none
            }

            .category-item__link._not-visible {
                opacity: .4
            }

            .category-item__link .h2 {
                position: relative;
                font-size: 24px;
                margin-top: 20px;
                letter-spacing: 1px
            }

            @media (min-width:420px) {
                .category-item__link .h2 {
                    font-size: 28px
                }
            }

            .category-item__link:before {
                content: "";
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                border-radius: 26px;
                background: #252525;
                opacity: .3
            }
        </style>
        <style type="text/css">
            .error-layout {
                margin: 0 0 36px;
                display: flex;
                align-items: center;
                flex-direction: column
            }

            .error-layout-block {
                text-align: center
            }

            .error-layout-block h1 {
                margin: 0;
                font-size: 106px
            }

            .error-layout-block p {
                font-size: 20px;
                margin: 0
            }

            .error-layout-block:not(:last-child) {
                margin-bottom: 36px
            }

            .error-layout-link {
                border-bottom: 2px solid var(--color-primary-1);
                line-height: 1
            }

            .error-layout-link:hover {
                border-color: transparent
            }
        </style>
        <style type="text/css">
            .ui-logo {
                font-size: 24px;
                position: relative
            }

            .ui-logo b {
                position: relative
            }

            .ui-logo b,
            .ui-logo i {
                z-index: 2;
                font-weight: 500
            }

            .ui-logo i {
                top: -2px;
                right: -16px;
                font-size: 12px;
                text-transform: lowercase;
                color: var(--color-white);
                border-radius: 24px;
                padding: 0 5px
            }

            .ui-logo:before,
            .ui-logo i {
                position: absolute;
                background: var(--color-primary-1)
            }

            .ui-logo:before {
                z-index: 1;
                content: "";
                left: -.125em;
                bottom: .25em;
                height: .35em;
                width: 5.1em;
                border-radius: 1px
            }

            .ui-logo._beta:before {
                display: none
            }
        </style>
        <style type="text/css">
            .base-button {
                position: relative;
                width: auto;
                display: inline-flex;
                line-height: 115%;
                justify-content: center;
                align-items: center;
                cursor: pointer;
                background: transparent;
                border: 3px solid transparent;
                border-radius: 8px;
                padding: 6px 17px 7px;
                font-weight: 400;
                white-space: nowrap;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
                text-decoration: none;
                transition: color .25s ease, background-color .25s ease, border-color .25s ease, box-shadow .25s ease, filter .25s ease
            }

            .base-button:hover {
                text-decoration: none !important
            }

            .base-button--loading {
                cursor: default
            }

            .base-button--loading:after {
                content: "";
                position: absolute;
                right: 4px;
                top: 50%;
                margin-top: -5px;
                width: 10px;
                height: 10px;
                border: 2px solid var(--color-white);
                border-right: 2px solid transparent;
                border-radius: 50%;
                display: inline-block;
                animation-duration: 1s;
                animation-iteration-count: infinite;
                animation-name: rotate-forever;
                animation-timing-function: linear
            }

            .base-button--small {
                padding: 6px 9px;
                font-size: 12px;
                font-weight: 400;
                border-radius: 8px
            }

            .base-button--small.base-button--loading:after {
                content: none
            }

            .base-button--big {
                padding: 8px 24px;
                font-size: 16px;
                font-weight: 500
            }

            .base-button--big.base-button--loading:after {
                right: 8px;
                top: 50%;
                margin-top: -8px;
                width: 16px;
                height: 16px
            }

            .base-button--fixed {
                min-width: 12.25rem;
                padding: .75rem 1.2rem;
                font-size: 1rem;
                font-weight: 700
            }

            .base-button--fixed.base-button--loading:after {
                margin-top: -10px;
                width: 21px;
                height: 21px
            }

            .base-button--default {
                background: var(--color-primary);
                border-color: var(--color-primary);
                color: var(--color-white)
            }

            .base-button--default:hover {
                border-color: var(--color-primary-1);
                background: var(--color-primary-1)
            }

            .base-button--default:active {
                border-color: var(--color-primary);
                background: var(--color-primary)
            }

            .base-button--default.base-button--outline {
                color: var(--color-primary);
                background: transparent
            }

            .base-button--default.base-button--outline:hover {
                background: var(--color-primary);
                color: var(--color-white);
                border-color: var(--color-primary)
            }

            .base-button--secondary {
                background: var(--color-primary-5);
                color: var(--color-primary)
            }

            .base-button--secondary:hover {
                border-color: var(--color-primary-4)
            }

            .base-button--secondary:active {
                border-color: var(--color-primary-5)
            }

            .base-button--secondary.base-button--text {
                background: transparent;
                border-color: transparent
            }

            .base-button--primary {
                background: var(--color-primary);
                border-color: var(--color-primary);
                color: var(--color-white)
            }

            .base-button--primary:hover {
                background: var(--color-primary-1);
                border-color: var(--color-primary-1)
            }

            .base-button--grey {
                background: #a9a7a7;
                border-color: #a9a7a7;
                color: var(--color-white)
            }

            .base-button--grey:hover {
                border-color: #d6d6d6;
                background: #d6d6d6
            }

            .base-button--grey.base-button--outline {
                background: transparent;
                border-color: #a9a7a7;
                color: #8e8e8e
            }

            .base-button--grey.base-button--outline:hover {
                background: #a9a7a7;
                color: var(--color-white)
            }

            .base-button--white {
                color: var(--color-gray-firm);
                background: var(--color-white)
            }

            .base-button--white.base-button--disabled,
            .base-button--white.base-button--disabled:hover {
                color: rgba(248, 136, 120, .5) !important;
                background: hsla(0, 0%, 100%, .5)
            }

            .base-button--danger {
                color: var(--color-red);
                background: var(--color-gray-bg)
            }

            .base-button--danger:hover {
                background: var(--color-gray-hover)
            }

            .base-button--primary-danger {
                color: var(--color-white);
                background: var(--color-red)
            }

            .base-button--primary-danger:hover {
                background: var(--color-red)
            }

            .base-button--transparent {
                color: var(--color-primary);
                background: transparent
            }

            .base-button--text {
                padding: 0;
                border-radius: 0;
                background: transparent;
                color: var(--color-text);
                border: none
            }

            .base-button--text:hover {
                background: transparent
            }

            .base-button--text.nuxt-link-exact-active,
            .base-button--text:hover {
                box-shadow: 0 2px 0 0 var(--color-primary-1)
            }

            .base-button--disabled {
                pointer-events: none;
                cursor: default;
                color: var(--color-gray-text) !important;
                background: var(--color-gray-hover);
                border-color: var(--color-gray-hover)
            }

            .base-button--disabled:hover {
                color: var(--color-gray-bg);
                background: var(--color-gray-hover)
            }

            .base-button--disabled path,
            .base-button--disabled rect,
            .base-button--disabled svg {
                fill: var(--color-gray-text) !important
            }

            .base-button--bold {
                font-weight: 500
            }

            @keyframes rotate-forever {
                0% {
                    transform: rotate(0deg)
                }

                to {
                    transform: rotate(1turn)
                }
            }
        </style>
        <style type="text/css">
            .site-layout-footer {
                padding: 32px 0
            }

            .site-layout-footer .wrapper {
                display: flex;
                justify-content: space-between;
                align-items: flex-start
            }

            .site-layout-footer__left__link {
                padding: 6px 0;
                font-size: 12px;
                margin-bottom: 4px
            }

            .site-layout-footer__logo {
                margin-bottom: 8px
            }

            .site-layout-footer__logo .landing-logo {
                font-size: 20px
            }

            .site-layout-footer__copy {
                font-weight: 300;
                font-size: 12px;
                color: #5f524d
            }

            .site-layout-footer__right {
                display: flex;
                flex-direction: column;
                align-items: flex-end
            }

            .site-layout-footer__right a {
                font-size: 14px
            }

            .site-layout-footer__right a:not(:last-child) {
                margin-bottom: 8px
            }

            .site-layout-footer__mail {
                font-size: 16px !important;
                display: flex;
                align-items: center
            }

            .site-layout-footer__mail svg {
                margin-right: 6px
            }

            .site-layout-footer__mail span {
                color: var(--color-primary-1)
            }

            .site-layout-footer ._dark.locale-switcher {
                border: none;
                background-position-x: 100%;
                padding-right: 14px
            }
        </style>
        <style type="text/css">
            .base-dropdown {
                position: relative;
                display: inline-block
            }

            .base-dropdown__container {
                position: absolute;
                padding: 16px;
                top: 100%;
                min-width: 150px;
                max-width: 100%;
                overflow: hidden;
                background-color: var(--color-white);
                box-shadow: var(--shadow-1);
                border-radius: var(--radius-md)
            }

            .base-dropdown-position-left .base-dropdown__container {
                left: 0
            }

            .base-dropdown-position-center .base-dropdown__container {
                left: 50%;
                transform: translateX(-50%) translateY(0)
            }

            .base-dropdown-position-right .base-dropdown__container {
                right: 0
            }

            .base-dropdown__overlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100vh;
                background-color: rgba(0, 0, 0, .15)
            }

            .base-dropdown .base-dropdown__transition-enter-active,
            .base-dropdown .base-dropdown__transition-leave-active {
                transition: all .2s ease
            }

            .base-dropdown .base-dropdown__transition-enter,
            .base-dropdown .base-dropdown__transition-leave-to {
                transform: translateY(-12px);
                opacity: 0
            }

            .base-dropdown-position-center .base-dropdown__transition-enter,
            .base-dropdown-position-center .base-dropdown__transition-leave-to {
                transform: translateX(-50%) translateY(-12px)
            }
        </style>
        <style type="text/css">
            .icon-button {
                color: var(--color-gray-firm);
                border: none;
                background: transparent;
                padding: 0;
                display: inline
            }

            .icon-button._flex {
                display: flex;
                align-items: center;
                justify-content: center
            }

            .icon-button._disabled {
                cursor: default;
                opacity: .5;
                pointer-events: none
            }
        </style>
        <style type="text/css">
            .site-layout-mobile-menu {
                display: inline-flex
            }

            @media (min-width:621px) {
                .site-layout-mobile-menu {
                    display: none
                }
            }

            .site-layout-mobile-menu__trigger {
                z-index: 9
            }

            .site-layout-mobile-menu .site-layout-mobile-menu__container {
                position: fixed;
                left: 16px !important;
                width: calc(100vw - 32px);
                padding-top: 26px;
                padding-bottom: 26px
            }

            .site-layout-mobile-menu .site-layout-mobile-menu__container-small-margin {
                top: 76px
            }

            .site-layout-mobile-menu .site-layout-mobile-menu__container-big-margin {
                top: 130px
            }

            @media (max-width:595px) {
                .site-layout-mobile-menu .site-layout-mobile-menu__container-big-margin {
                    top: 150px
                }
            }

            @media (max-width:405px) {
                .site-layout-mobile-menu .site-layout-mobile-menu__container-big-margin {
                    top: 170px
                }
            }

            @media (max-width:329px) {
                .site-layout-mobile-menu .site-layout-mobile-menu__container-big-margin {
                    top: 190px
                }
            }

            .site-layout-mobile-menu__navigation {
                display: flex;
                flex-direction: column;
                align-items: center;
                grid-gap: 20px;
                gap: 20px
            }

            @media (min-width:621px) {
                .site-layout-mobile-menu__navigation {
                    display: none
                }
            }

            .site-layout-mobile-menu__divider {
                height: 1px;
                width: 100%;
                max-width: 256px;
                background-color: var(--color-gray-300)
            }
        </style>
        <style type="text/css">
            .site-layout-header {
                left: 0;
                top: 0;
                width: 100%;
                background: var(--color-white);
                z-index: 100;
                transition: background .25s, box-shadow .25s
            }

            .site-layout-header._transition {
                box-shadow: var(--shadow-1);
                background: var(--color-white)
            }

            .site-layout-header._transition._top {
                background: transparent;
                box-shadow: none
            }

            @media (max-width:600px) {
                .site-layout-header .landing-logo {
                    font-size: 22px
                }
            }

            .site-layout-header__top {
                padding: 12px 0;
                background: #000;
                color: #fff;
                font-size: 14px
            }

            .site-layout-header__top b {
                font-weight: 500
            }

            .site-layout-header__top a {
                color: #8ebeff;
                font-weight: 500
            }

            .site-layout-header__base {
                padding: 10px 16px;
                height: 100%;
                display: flex;
                justify-content: space-between;
                align-items: center
            }

            .site-layout-header__pages {
                font-size: 14px;
                display: flex;
                align-items: center;
                grid-gap: 28px;
                gap: 28px
            }

            @media (max-width:620px) {
                .site-layout-header__pages {
                    display: none
                }
            }

            .site-layout-header__actions {
                font-size: 14px;
                display: flex;
                justify-content: space-between;
                align-items: center;
                grid-gap: 28px;
                gap: 28px
            }

            @media (max-width:620px) {
                .site-layout-header__actions .site-layout-header__signup {
                    display: none
                }
            }

            .site-layout-header__profile.base-button--text {
                display: flex;
                align-items: center;
                box-shadow: none !important;
                padding: 12px;
                border-radius: var(--radius-md)
            }

            .site-layout-header__profile.base-button--text.nuxt-link-exact-active,
            .site-layout-header__profile.base-button--text:hover {
                background: rgba(0, 0, 0, .04)
            }

            .site-layout-header__profile.base-button--text svg {
                margin-right: 6px;
                margin-top: -2px
            }
        </style>
        <style type="text/css">
            .page-layout {
                justify-content: space-between;
                background: var(--color-gray-bg)
            }

            .page-layout__content {
                margin-top: 32px
            }

            .page-layout__inner {
                flex-grow: 1;
                padding: 24px;
                background: var(--color-white);
                border-radius: 24px;
                box-shadow: 0 0 30px -14px rgba(0, 0, 0, .3)
            }

            .page-layout .wrapper {
                width: 100%;
                display: flex;
                flex-grow: 1
            }

            .page-layout .h1 {
                margin-top: 0;
                font-weight: 500
            }
        </style>
        <style type="text/css">
            .toasted {
                padding: 0 20px
            }

            .toasted.rounded {
                border-radius: 24px
            }

            .toasted .primary,
            .toasted.toasted-primary {
                border-radius: 2px;
                min-height: 38px;
                line-height: 1.1em;
                background-color: #353535;
                padding: 6px 20px;
                font-size: 15px;
                font-weight: 300;
                color: #fff;
                box-shadow: 0 1px 3px rgba(0, 0, 0, .12), 0 1px 2px rgba(0, 0, 0, .24)
            }

            .toasted .primary.success,
            .toasted.toasted-primary.success {
                background: #4caf50
            }

            .toasted .primary.error,
            .toasted.toasted-primary.error {
                background: #f44336
            }

            .toasted .primary.info,
            .toasted.toasted-primary.info {
                background: #3f51b5
            }

            .toasted .primary .action,
            .toasted.toasted-primary .action {
                color: #a1c2fa
            }

            .toasted.bubble {
                border-radius: 30px;
                min-height: 38px;
                line-height: 1.1em;
                background-color: #ff7043;
                padding: 0 20px;
                font-size: 15px;
                font-weight: 300;
                color: #fff;
                box-shadow: 0 1px 3px rgba(0, 0, 0, .12), 0 1px 2px rgba(0, 0, 0, .24)
            }

            .toasted.bubble.success {
                background: #4caf50
            }

            .toasted.bubble.error {
                background: #f44336
            }

            .toasted.bubble.info {
                background: #3f51b5
            }

            .toasted.bubble .action {
                color: #8e2b0c
            }

            .toasted.outline {
                border-radius: 30px;
                min-height: 38px;
                line-height: 1.1em;
                background-color: #fff;
                border: 1px solid #676767;
                padding: 0 20px;
                font-size: 15px;
                color: #676767;
                box-shadow: 0 1px 3px rgba(0, 0, 0, .12), 0 1px 2px rgba(0, 0, 0, .24);
                font-weight: 700
            }

            .toasted.outline.success {
                color: #4caf50;
                border-color: #4caf50
            }

            .toasted.outline.error {
                color: #f44336;
                border-color: #f44336
            }

            .toasted.outline.info {
                color: #3f51b5;
                border-color: #3f51b5
            }

            .toasted.outline .action {
                color: #607d8b
            }

            .toasted-container {
                position: fixed;
                z-index: 10000
            }

            .toasted-container,
            .toasted-container.full-width {
                display: -ms-flexbox;
                display: flex;
                -ms-flex-direction: column;
                flex-direction: column
            }

            .toasted-container.full-width {
                max-width: 86%;
                width: 100%
            }

            .toasted-container.full-width.fit-to-screen {
                min-width: 100%
            }

            .toasted-container.full-width.fit-to-screen .toasted:first-child {
                margin-top: 0
            }

            .toasted-container.full-width.fit-to-screen.top-right {
                top: 0;
                right: 0
            }

            .toasted-container.full-width.fit-to-screen.top-left {
                top: 0;
                left: 0
            }

            .toasted-container.full-width.fit-to-screen.top-center {
                top: 0;
                left: 0;
                -webkit-transform: translateX(0);
                transform: translateX(0)
            }

            .toasted-container.full-width.fit-to-screen.bottom-right {
                right: 0;
                bottom: 0
            }

            .toasted-container.full-width.fit-to-screen.bottom-left {
                left: 0;
                bottom: 0
            }

            .toasted-container.full-width.fit-to-screen.bottom-center {
                left: 0;
                bottom: 0;
                -webkit-transform: translateX(0);
                transform: translateX(0)
            }

            .toasted-container.top-right {
                top: 10%;
                right: 7%
            }

            .toasted-container.top-left {
                top: 10%;
                left: 7%
            }

            .toasted-container.top-center {
                top: 10%;
                left: 50%;
                -webkit-transform: translateX(-50%);
                transform: translateX(-50%)
            }

            .toasted-container.bottom-right {
                right: 5%;
                bottom: 7%
            }

            .toasted-container.bottom-left {
                left: 5%;
                bottom: 7%
            }

            .toasted-container.bottom-center {
                left: 50%;
                -webkit-transform: translateX(-50%);
                transform: translateX(-50%);
                bottom: 7%
            }

            .toasted-container.bottom-left .toasted,
            .toasted-container.top-left .toasted {
                float: left
            }

            .toasted-container.bottom-right .toasted,
            .toasted-container.top-right .toasted {
                float: right
            }

            .toasted-container .toasted {
                top: 35px;
                width: auto;
                clear: both;
                margin-top: 10px;
                position: relative;
                max-width: 100%;
                height: auto;
                word-break: normal;
                display: -ms-flexbox;
                display: flex;
                -ms-flex-align: center;
                align-items: center;
                -ms-flex-pack: justify;
                justify-content: space-between;
                box-sizing: inherit
            }

            .toasted-container .toasted .fa,
            .toasted-container .toasted .fab,
            .toasted-container .toasted .far,
            .toasted-container .toasted .fas,
            .toasted-container .toasted .material-icons,
            .toasted-container .toasted .mdi {
                margin-right: .5rem;
                margin-left: -.4rem
            }

            .toasted-container .toasted .fa.after,
            .toasted-container .toasted .fab.after,
            .toasted-container .toasted .far.after,
            .toasted-container .toasted .fas.after,
            .toasted-container .toasted .material-icons.after,
            .toasted-container .toasted .mdi.after {
                margin-left: .5rem;
                margin-right: -.4rem
            }

            .toasted-container .toasted .action {
                text-decoration: none;
                font-size: .8rem;
                padding: 8px;
                margin: 5px -7px 5px 7px;
                border-radius: 3px;
                text-transform: uppercase;
                letter-spacing: .03em;
                font-weight: 600;
                cursor: pointer
            }

            .toasted-container .toasted .action.icon {
                padding: 4px;
                display: -ms-flexbox;
                display: flex;
                -ms-flex-align: center;
                align-items: center;
                -ms-flex-pack: center;
                justify-content: center
            }

            .toasted-container .toasted .action.icon .fa,
            .toasted-container .toasted .action.icon .material-icons,
            .toasted-container .toasted .action.icon .mdi {
                margin-right: 0;
                margin-left: 4px
            }

            .toasted-container .toasted .action.icon:hover {
                text-decoration: none
            }

            .toasted-container .toasted .action:hover {
                text-decoration: underline
            }

            @media only screen and (max-width:600px) {
                .toasted-container {
                    min-width: 100%
                }

                .toasted-container .toasted:first-child {
                    margin-top: 0
                }

                .toasted-container.top-right {
                    top: 0;
                    right: 0
                }

                .toasted-container.top-left {
                    top: 0;
                    left: 0
                }

                .toasted-container.top-center {
                    top: 0;
                    left: 0;
                    -webkit-transform: translateX(0);
                    transform: translateX(0)
                }

                .toasted-container.bottom-right {
                    right: 0;
                    bottom: 0
                }

                .toasted-container.bottom-left {
                    left: 0;
                    bottom: 0
                }

                .toasted-container.bottom-center {
                    left: 0;
                    bottom: 0;
                    -webkit-transform: translateX(0);
                    transform: translateX(0)
                }

                .toasted-container.bottom-center,
                .toasted-container.top-center {
                    -ms-flex-align: stretch !important;
                    align-items: stretch !important
                }

                .toasted-container.bottom-left .toasted,
                .toasted-container.bottom-right .toasted,
                .toasted-container.top-left .toasted,
                .toasted-container.top-right .toasted {
                    float: none
                }

                .toasted-container .toasted {
                    border-radius: 0
                }
            }
        </style>
        <style type="text/css">
            /*! PhotoSwipe main CSS by Dmitry Semenov | photoswipe.com | MIT license */
            .pswp {
                display: none;
                position: absolute;
                width: 100%;
                height: 100%;
                left: 0;
                top: 0;
                overflow: hidden;
                touch-action: none;
                z-index: 1500;
                -webkit-text-size-adjust: 100%;
                -webkit-backface-visibility: hidden;
                outline: none
            }

            .pswp * {
                box-sizing: border-box
            }

            .pswp img {
                max-width: none
            }

            .pswp--animate_opacity {
                opacity: .001;
                will-change: opacity;
                transition: opacity 333ms cubic-bezier(.4, 0, .22, 1)
            }

            .pswp--open {
                display: block
            }

            .pswp--zoom-allowed .pswp__img {
                cursor: -webkit-zoom-in;
                cursor: -moz-zoom-in;
                cursor: zoom-in
            }

            .pswp--zoomed-in .pswp__img {
                cursor: -webkit-grab;
                cursor: -moz-grab;
                cursor: grab
            }

            .pswp--dragging .pswp__img {
                cursor: -webkit-grabbing;
                cursor: -moz-grabbing;
                cursor: grabbing
            }

            .pswp__bg {
                background: #000;
                opacity: 0;
                transform: translateZ(0);
                -webkit-backface-visibility: hidden
            }

            .pswp__bg,
            .pswp__scroll-wrap {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%
            }

            .pswp__scroll-wrap {
                overflow: hidden
            }

            .pswp__container,
            .pswp__zoom-wrap {
                touch-action: none;
                position: absolute;
                left: 0;
                right: 0;
                top: 0;
                bottom: 0
            }

            .pswp__container,
            .pswp__img {
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
                -webkit-tap-highlight-color: transparent;
                -webkit-touch-callout: none
            }

            .pswp__zoom-wrap {
                position: absolute;
                width: 100%;
                transform-origin: left top;
                transition: transform 333ms cubic-bezier(.4, 0, .22, 1)
            }

            .pswp__bg {
                will-change: opacity;
                transition: opacity 333ms cubic-bezier(.4, 0, .22, 1)
            }

            .pswp--animated-in .pswp__bg,
            .pswp--animated-in .pswp__zoom-wrap {
                transition: none
            }

            .pswp__container,
            .pswp__zoom-wrap {
                -webkit-backface-visibility: hidden
            }

            .pswp__item {
                right: 0;
                bottom: 0;
                overflow: hidden
            }

            .pswp__img,
            .pswp__item {
                position: absolute;
                left: 0;
                top: 0
            }

            .pswp__img {
                width: auto;
                height: auto
            }

            .pswp__img--placeholder {
                -webkit-backface-visibility: hidden
            }

            .pswp__img--placeholder--blank {
                background: #222
            }

            .pswp--ie .pswp__img {
                width: 100% !important;
                height: auto !important;
                left: 0;
                top: 0
            }

            .pswp__error-msg {
                position: absolute;
                left: 0;
                top: 50%;
                width: 100%;
                text-align: center;
                font-size: 14px;
                line-height: 16px;
                margin-top: -8px;
                color: #ccc
            }

            .pswp__error-msg a {
                color: #ccc;
                text-decoration: underline
            }
        </style>
        <style type="text/css">
            /*! PhotoSwipe Default UI CSS by Dmitry Semenov | photoswipe.com | MIT license */
            .pswp__button {
                width: 44px;
                height: 44px;
                position: relative;
                background: none;
                cursor: pointer;
                overflow: visible;
                -webkit-appearance: none;
                display: block;
                border: 0;
                padding: 0;
                margin: 0;
                float: right;
                opacity: .75;
                transition: opacity .2s;
                box-shadow: none
            }

            .pswp__button:focus,
            .pswp__button:hover {
                opacity: 1
            }

            .pswp__button:active {
                outline: none;
                opacity: .9
            }

            .pswp__button::-moz-focus-inner {
                padding: 0;
                border: 0
            }

            .pswp__ui--over-close .pswp__button--close {
                opacity: 1
            }

            .pswp__button,
            .pswp__button--arrow--left:before,
            .pswp__button--arrow--right:before {
                background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAQgAAABYCAQAAACjBqE3AAAB6klEQVR4Ae3bsWpUQRTG8YkkanwCa7GzVotsI/gEgk9h4Vu4ySLYmMYgbJrc3lrwZbJwC0FMt4j7F6Y4oIZrsXtgxvx/1c0ufEX4cnbmLCmSJEmSJEmSJEmSJP3XCBPvbJU+8doWmDFwyZpLBmYlNJebz0KwzykwsuSYJSNwykEJreV2BaBMaLIQZ2xYcFgqDlmw4ayE/FwL0dDk4Qh4W37DAjgqIT+3HRbigjH+iikVdxgZStgyN0Su2sXIeTwTT+esdpcbIlfNAuZ/TxresG4zV8kYWSZNiKUTokMMSWeIwTNEn4fK2TW3gRNgVkJLuVksROA9G+bEvoATNlBCa7nZXEwdxEZxzpKRKFh+bsv8LmPFmhX1OwfIz81jIRJQ5eeqG9B+riRJkiRJkiRJkiRJkiRJkiRJUkvA/8RQoEpKlJWINFkJ62AlrEP/mNBibnv2yz/A3t7Uq3LcpoxP8COjC1T5vxoAD5VdoEqdDrd5QuW1swtUSaueh3zkiuBiqgtA2OlkeMcP/uDqugsJdbjHF65VdPMKwS0+WQc/MgKvrIOHysB9vgPwk8+85hmPbnQdvHZyDMAFD7L3EOpgMcVdvnHFS0/vlatrXvCVx0U9gt3fxvnA0/hB4nmRJEmSJEmSJEmSJGmHfgFLaDPoMu5xWwAAAABJRU5ErkJggg==) 0 0 no-repeat;
                background-size: 264px 88px;
                width: 44px;
                height: 44px
            }

            @media (-webkit-min-device-pixel-ratio:1.1),
            (-webkit-min-device-pixel-ratio:1.09375),
            (min-resolution:1.1dppx),
            (min-resolution:105dpi) {

                .pswp--svg .pswp__button,
                .pswp--svg .pswp__button--arrow--left:before,
                .pswp--svg .pswp__button--arrow--right:before {
                    background-image: url(/_nuxt/img/default-skin.f64c3af.svg)
                }

                .pswp--svg .pswp__button--arrow--left,
                .pswp--svg .pswp__button--arrow--right {
                    background: none
                }
            }

            .pswp__button--close {
                background-position: 0 -44px
            }

            .pswp__button--share {
                background-position: -44px -44px
            }

            .pswp__button--fs {
                display: none
            }

            .pswp--supports-fs .pswp__button--fs {
                display: block
            }

            .pswp--fs .pswp__button--fs {
                background-position: -44px 0
            }

            .pswp__button--zoom {
                display: none;
                background-position: -88px 0
            }

            .pswp--zoom-allowed .pswp__button--zoom {
                display: block
            }

            .pswp--zoomed-in .pswp__button--zoom {
                background-position: -132px 0
            }

            .pswp--touch .pswp__button--arrow--left,
            .pswp--touch .pswp__button--arrow--right {
                visibility: hidden
            }

            .pswp__button--arrow--left,
            .pswp__button--arrow--right {
                background: none;
                top: 50%;
                margin-top: -50px;
                width: 70px;
                height: 100px;
                position: absolute
            }

            .pswp__button--arrow--left {
                left: 0
            }

            .pswp__button--arrow--right {
                right: 0
            }

            .pswp__button--arrow--left:before,
            .pswp__button--arrow--right:before {
                content: "";
                top: 35px;
                background-color: rgba(0, 0, 0, .3);
                height: 30px;
                width: 32px;
                position: absolute
            }

            .pswp__button--arrow--left:before {
                left: 6px;
                background-position: -138px -44px
            }

            .pswp__button--arrow--right:before {
                right: 6px;
                background-position: -94px -44px
            }

            .pswp__counter,
            .pswp__share-modal {
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none
            }

            .pswp__share-modal {
                display: block;
                background: rgba(0, 0, 0, .5);
                width: 100%;
                height: 100%;
                top: 0;
                left: 0;
                padding: 10px;
                position: absolute;
                z-index: 1600;
                opacity: 0;
                transition: opacity .25s ease-out;
                -webkit-backface-visibility: hidden;
                will-change: opacity
            }

            .pswp__share-modal--hidden {
                display: none
            }

            .pswp__share-tooltip {
                z-index: 1620;
                position: absolute;
                background: #fff;
                top: 56px;
                border-radius: 2px;
                display: block;
                width: auto;
                right: 44px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, .25);
                transform: translateY(6px);
                transition: transform .25s;
                -webkit-backface-visibility: hidden;
                will-change: transform
            }

            .pswp__share-tooltip a {
                display: block;
                padding: 8px 12px;
                font-size: 14px;
                line-height: 18px
            }

            .pswp__share-tooltip a,
            .pswp__share-tooltip a:hover {
                color: #000;
                text-decoration: none
            }

            .pswp__share-tooltip a:first-child {
                border-radius: 2px 2px 0 0
            }

            .pswp__share-tooltip a:last-child {
                border-radius: 0 0 2px 2px
            }

            .pswp__share-modal--fade-in {
                opacity: 1
            }

            .pswp__share-modal--fade-in .pswp__share-tooltip {
                transform: translateY(0)
            }

            .pswp--touch .pswp__share-tooltip a {
                padding: 16px 12px
            }

            a.pswp__share--facebook:before {
                content: "";
                display: block;
                width: 0;
                height: 0;
                position: absolute;
                top: -12px;
                right: 15px;
                border: 6px solid transparent;
                border-bottom-color: #fff;
                -webkit-pointer-events: none;
                -moz-pointer-events: none;
                pointer-events: none
            }

            a.pswp__share--facebook:hover {
                background: #3e5c9a;
                color: #fff
            }

            a.pswp__share--facebook:hover:before {
                border-bottom-color: #3e5c9a
            }

            a.pswp__share--twitter:hover {
                background: #55acee;
                color: #fff
            }

            a.pswp__share--pinterest:hover {
                background: #ccc;
                color: #ce272d
            }

            a.pswp__share--download:hover {
                background: #ddd
            }

            .pswp__counter {
                position: absolute;
                left: 0;
                top: 0;
                height: 44px;
                font-size: 13px;
                line-height: 44px;
                color: #fff;
                opacity: .75;
                padding: 0 10px
            }

            .pswp__caption {
                position: absolute;
                left: 0;
                bottom: 0;
                width: 100%;
                min-height: 44px
            }

            .pswp__caption small {
                font-size: 11px;
                color: #bbb
            }

            .pswp__caption__center {
                text-align: left;
                max-width: 420px;
                margin: 0 auto;
                font-size: 13px;
                padding: 10px;
                line-height: 20px;
                color: #ccc
            }

            .pswp__caption--empty {
                display: none
            }

            .pswp__caption--fake {
                visibility: hidden
            }

            .pswp__preloader {
                width: 44px;
                height: 44px;
                position: absolute;
                top: 0;
                left: 50%;
                margin-left: -22px;
                opacity: 0;
                transition: opacity .25s ease-out;
                will-change: opacity;
                direction: ltr
            }

            .pswp__preloader__icn {
                width: 20px;
                height: 20px;
                margin: 12px
            }

            .pswp__preloader--active {
                opacity: 1
            }

            .pswp__preloader--active .pswp__preloader__icn {
                background: url(data:image/gif;base64,R0lGODlhFAAUAPMIAIeHhz8/P1dXVycnJ8/Pz7e3t5+fn29vb////wAAAAAAAAAAAAAAAAAAAAAAAAAAACH/C05FVFNDQVBFMi4wAwEAAAAh+QQFBwAIACwAAAAAFAAUAEAEUxDJSatFxtwaggWAdIyHJAhXoRYSQUhDPGx0TbmujahbXGWZWqdDAYEsp5NupLPkdDwE7oXwWVasimzWrAE1tKFHErQRK8eL8mMUlRBJVI307uoiACH5BAUHAAgALAEAAQASABIAAAROEMkpS6E4W5upMdUmEQT2feFIltMJYivbvhnZ3R0A4NMwIDodz+cL7nDEn5CH8DGZh8MtEMBEoxkqlXKVIgQCibbK9YLBYvLtHH5K0J0IACH5BAUHAAgALAEAAQASABIAAAROEMkpjaE4W5spANUmFQX2feFIltMJYivbvhnZ3d1x4BNBIDodz+cL7nDEn5CH8DGZAsFtMMBEoxkqlXKVIgIBibbK9YLBYvLtHH5K0J0IACH5BAUHAAgALAEAAQASABIAAAROEMkpAaA4W5vpOdUmGQb2feFIltMJYivbvhnZ3Z0g4FNRIDodz+cL7nDEn5CH8DGZgcCNQMBEoxkqlXKVIgYDibbK9YLBYvLtHH5K0J0IACH5BAUHAAgALAEAAQASABIAAAROEMkpz6E4W5upENUmAQD2feFIltMJYivbvhnZ3V0Q4JNhIDodz+cL7nDEn5CH8DGZg8GtUMBEoxkqlXKVIggEibbK9YLBYvLtHH5K0J0IACH5BAUHAAgALAEAAQASABIAAAROEMkphaA4W5tpCNUmHQf2feFIltMJYivbvhnZ3d0w4BMAIDodz+cL7nDEn5CH8DGZBMLNYMBEoxkqlXKVIgoFibbK9YLBYvLtHH5K0J0IACH5BAUHAAgALAEAAQASABIAAAROEMkpQ6A4W5vpGNUmCQL2feFIltMJYivbvhnZ3R1B4NNxIDodz+cL7nDEn5CH8DGZhcINAMBEoxkqlXKVIgwGibbK9YLBYvLtHH5K0J0IACH5BAUHAAcALAEAAQASABIAAANCeLo6wzA6FxkhbaoQ4L3ZxnXLh0EjWZ4RV71VUcCLIByyTNt2PsO8m452sBGJBsNxkUwuD03lAQBASqnUJ7aq5UYSADs=) 0 0 no-repeat
            }

            .pswp--css_animation .pswp__preloader--active {
                opacity: 1
            }

            .pswp--css_animation .pswp__preloader--active .pswp__preloader__icn {
                animation: clockwise .5s linear infinite
            }

            .pswp--css_animation .pswp__preloader--active .pswp__preloader__donut {
                animation: donut-rotate 1s cubic-bezier(.4, 0, .22, 1) infinite
            }

            .pswp--css_animation .pswp__preloader__icn {
                background: none;
                opacity: .75;
                width: 14px;
                height: 14px;
                position: absolute;
                left: 15px;
                top: 15px;
                margin: 0
            }

            .pswp--css_animation .pswp__preloader__cut {
                position: relative;
                width: 7px;
                height: 14px;
                overflow: hidden
            }

            .pswp--css_animation .pswp__preloader__donut {
                box-sizing: border-box;
                width: 14px;
                height: 14px;
                border-radius: 50%;
                border-color: #fff #fff transparent transparent;
                border-style: solid;
                border-width: 2px;
                position: absolute;
                top: 0;
                left: 0;
                background: none;
                margin: 0
            }

            @media screen and (max-width:1024px) {
                .pswp__preloader {
                    position: relative;
                    left: auto;
                    top: auto;
                    margin: 0;
                    float: right
                }
            }

            @keyframes clockwise {
                0% {
                    transform: rotate(0deg)
                }

                to {
                    transform: rotate(1turn)
                }
            }

            @keyframes donut-rotate {
                0% {
                    transform: rotate(0)
                }

                50% {
                    transform: rotate(-140deg)
                }

                to {
                    transform: rotate(0)
                }
            }

            .pswp__ui {
                -webkit-font-smoothing: auto;
                visibility: visible;
                opacity: 1;
                z-index: 1550
            }

            .pswp__top-bar {
                position: absolute;
                left: 0;
                top: 0;
                height: 44px;
                width: 100%
            }

            .pswp--has_mouse .pswp__button--arrow--left,
            .pswp--has_mouse .pswp__button--arrow--right,
            .pswp__caption,
            .pswp__top-bar {
                -webkit-backface-visibility: hidden;
                will-change: opacity;
                transition: opacity 333ms cubic-bezier(.4, 0, .22, 1)
            }

            .pswp--has_mouse .pswp__button--arrow--left,
            .pswp--has_mouse .pswp__button--arrow--right {
                visibility: visible
            }

            .pswp__caption,
            .pswp__top-bar {
                background-color: rgba(0, 0, 0, .5)
            }

            .pswp__ui--fit .pswp__caption,
            .pswp__ui--fit .pswp__top-bar {
                background-color: rgba(0, 0, 0, .3)
            }

            .pswp__ui--idle .pswp__button--arrow--left,
            .pswp__ui--idle .pswp__button--arrow--right,
            .pswp__ui--idle .pswp__top-bar {
                opacity: 0
            }

            .pswp__ui--hidden .pswp__button--arrow--left,
            .pswp__ui--hidden .pswp__button--arrow--right,
            .pswp__ui--hidden .pswp__caption,
            .pswp__ui--hidden .pswp__top-bar {
                opacity: .001
            }

            .pswp__ui--one-slide .pswp__button--arrow--left,
            .pswp__ui--one-slide .pswp__button--arrow--right,
            .pswp__ui--one-slide .pswp__counter {
                display: none
            }

            .pswp__element--disabled {
                display: none !important
            }

            .pswp--minimal--dark .pswp__top-bar {
                background: none
            }
        </style>
        <style type="text/css">
            .resize-observer[data-v-8859cc6c] {
                position: absolute;
                top: 0;
                left: 0;
                z-index: -1;
                width: 100%;
                height: 100%;
                border: none;
                background-color: transparent;
                pointer-events: none;
                display: block;
                overflow: hidden;
                opacity: 0
            }

            .resize-observer[data-v-8859cc6c] object {
                display: block;
                position: absolute;
                top: 0;
                left: 0;
                height: 100%;
                width: 100%;
                overflow: hidden;
                pointer-events: none;
                z-index: -1
            }

            .customModal{
                backdrop-filter: blur(3px);
                border-radius: 15px;
                padding: 25px 25px;
                background: #ff182f54;
                box-shadow: 0px 0px 20px 0px #3a3a3a73;
            }
        </style>
        <style type="text/css">
            .base-modal {
                display: flex;
                position: fixed;
                top: 0;
                left: 0;
                z-index: 2000;
                width: 100%;
                height: 100vh;
                height: 100dvh;
                align-items: center;
                justify-content: center;
                --vertical-gap: 86px
            }

            @media (max-width:500px) {
                .base-modal {
                    --vertical-gap: 24px
                }
            }

            .base-modal__overlay {
                width: 100%;
                height: 100%;
                position: absolute;
                left: 0;
                top: 0;
                background: rgba(0, 0, 0, .55)
            }

            .base-modal__main {
                width: 100%;
                max-height: calc(100vh - var(--vertical-gap));
                max-height: calc(100dvh - var(--vertical-gap));
                display: flex;
                flex-direction: column;
                position: relative;
                background-color: var(--color-white);
                margin: 0 16px;
                padding: 24px;
                height: auto;
                border-radius: var(--radius-xl);
                overflow: visible
            }

            @media (max-width:500px) {
                .base-modal__main {
                    margin: 0 12px;
                    padding: 12px 6px 18px 12px;
                    border-radius: var(--radius-md)
                }
            }

            @media (max-width:500px) {
                .base-modal__main-wide {
                    padding: 12px 12px 18px !important
                }
            }

            .base-modal__header {
                width: 100%;
                display: flex;
                justify-content: flex-start
            }

            .base-modal__header-title {
                width: 100%;
                font-weight: 500;
                margin: 0 0 16px;
                text-align: left
            }

            @media (max-width:500px) {
                .base-modal__header-title {
                    text-align: center;
                    font-size: 20px;
                    margin-bottom: 12px
                }
            }

            .base-modal__header-close {
                position: absolute !important;
                top: 10px;
                right: 10px;
                cursor: pointer;
                z-index: 2;
                color: var(--color-gray-stroke)
            }

            .base-modal__body {
                flex-grow: 1
            }

            .base-modal__body.base-scrollbar {
                padding-left: 0 !important;
                padding-right: 8px
            }

            .base-modal__footer {
                display: flex;
                justify-content: flex-end;
                margin-top: 16px;
                grid-gap: 12px;
                gap: 12px
            }

            @media (max-width:500px) {
                .base-modal__footer {
                    margin-top: 12px;
                    justify-content: center
                }
            }

            .modal-enter-active,
            .modal-leave-active {
                transition: opacity .2s
            }

            .modal-enter-active .base-modal__main,
            .modal-leave-active .base-modal__main {
                transition: transform .2s
            }

            .modal-enter,
            .modal-leave-to {
                opacity: 0
            }

            .modal-enter .base-modal__main,
            .modal-leave-to .base-modal__main {
                transform: scale(.97) translateY(-10px)
            }
        </style>
        <style type="text/css">
            .crud-modal .base-modal__body.base-scrollbar {
                padding: 4px 8px 18px 4px !important
            }

            .crud-modal-form {
                display: flex;
                flex-direction: column;
                grid-gap: 18px;
                gap: 18px
            }

            .crud-modal-footer {
                display: flex;
                align-items: center;
                grid-gap: 12px;
                gap: 12px
            }
        </style>
        <style type="text/css">
            .base-form-label__name {
                display: flex;
                font-size: 12px;
                margin-bottom: 6px;
                color: var(--color-gray-500)
            }
        </style>
        <style type="text/css">
            .base-form-hint {
                position: relative;
                z-index: 2;
                cursor: default
            }

            .base-form-hint__icon {
                display: none;
                position: absolute;
                right: 1rem;
                top: -1.75rem;
                width: 1rem;
                height: 1rem
            }

            .base-form-hint__inner {
                width: 100%;
                position: absolute;
                background: #ffe8e5;
                border-radius: 0 0 4px 4px;
                font-size: 12px;
                color: #5f0505;
                padding: 4px 6px;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
                box-shadow: var(--shadow-1)
            }

            .base-form-hint--right .base-form-hint__inner {
                right: 0
            }

            .base-form-hint--left .base-form-hint__inner {
                left: 0
            }
        </style>
        <style type="text/css">
            .base-form-row {
                position: relative;
                flex: 1 1 0
            }

            .base-form-row--error .base-form-input,
            .base-form-row--error .base-form-select {
                border-color: var(--color-red) !important
            }

            .base-form-row--required .base-form-label__name {
                position: relative
            }

            .base-form-row--required .base-form-label__name:after {
                content: "*";
                margin-left: 2px;
                color: var(--color-red)
            }

            html[dir=rtl] .base-form-row--required .base-form-label__name:after {
                margin-left: 0;
                margin-right: 2px
            }

            .base-form-row .base-form-hint {
                position: absolute;
                right: 0;
                bottom: 0;
                width: 100%
            }

            .base-form-row .base-form-checkbox {
                margin-top: 4px
            }
        </style>
        <style type="text/css">
            .base-form-row-wr {
                display: flex;
                flex-wrap: wrap;
                grid-gap: 16px;
                gap: 16px
            }

            .base-form-row-wr:not(:last-child) {
                margin-bottom: 18px
            }
        </style>
        <style type="text/css">
            .base-form-select {
                width: 100%;
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                border-radius: var(--radius-sm);
                line-height: 1;
                box-sizing: border-box;
                outline: none;
                font-size: 14px;
                border: 2px solid transparent;
                transition: box-shadow .25s, border-color .25s, background-color .25s;
                background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg width='10' height='5' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M5.054 4.612a.447.447 0 00.268-.114L8.897 1.28A.447.447 0 108.3.615l-3.277 2.95L1.746.615a.447.447 0 10-.598.665l3.576 3.218a.447.447 0 00.33.114z' fill='%23536581' stroke='%23536581' stroke-width='.4'/%3E%3C/svg%3E");
                background-color: var(--color-gray-200);
                background-repeat: no-repeat;
                background-position: calc(100% - 16px) 16px;
                background-size: 12px
            }

            .base-form-select:focus {
                border-color: var(--color-gray-400)
            }

            html[dir=rtl] .base-form-select {
                background-position: 16px 16px;
                padding-left: 34px;
                padding-right: 14px
            }

            .base-form-select._empty {
                color: var(--color-gray-400)
            }

            .base-form-select--regular {
                font-size: 14px;
                padding: 11px 34px 11px 14px
            }

            .base-form-select--small {
                font-size: 12px;
                padding: 8px 24px 8px 7px;
                background-position: calc(100% - 6px) 12px
            }
        </style>
        <style type="text/css">
            .base-spinner {
                display: flex;
                width: 16px;
                height: 16px;
                position: relative
            }

            .base-spinner:before {
                content: "";
                width: 100%;
                height: 100%;
                border: 2px solid var(--color-primary);
                border-right: 2px solid transparent;
                border-radius: 100%;
                display: inline-block;
                animation-duration: 1s;
                animation-iteration-count: infinite;
                animation-name: rotate-forever;
                animation-timing-function: linear
            }

            .base-spinner--white:before {
                border-color: var(--color-white);
                border-right-color: transparent
            }

            .base-spinner--gray:before {
                border-color: var(--color-gray-hover);
                border-right-color: transparent
            }

            .base-spinner--dark-gray:before {
                border-color: var(--color-gray-text);
                border-right-color: transparent
            }

            .base-spinner--small {
                width: 12px;
                height: 12px
            }

            .base-spinner--big {
                width: 32px;
                height: 32px
            }
        </style>
        <style type="text/css">
            /*!
               * Cropper.js v1.6.0
               * https://fengyuanchen.github.io/cropperjs
               *
               * Copyright 2015-present Chen Fengyuan
               * Released under the MIT license
               *
               * Date: 2023-08-26T08:14:25.104Z
               */
            .cropper-container {
                direction: ltr;
                font-size: 0;
                line-height: 0;
                position: relative;
                touch-action: none;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none
            }

            .cropper-container img {
                -webkit-backface-visibility: hidden;
                backface-visibility: hidden;
                display: block;
                height: 100%;
                image-orientation: 0deg;
                max-height: none !important;
                max-width: none !important;
                min-height: 0 !important;
                min-width: 0 !important;
                width: 100%
            }

            .cropper-canvas,
            .cropper-crop-box,
            .cropper-drag-box,
            .cropper-modal,
            .cropper-wrap-box {
                bottom: 0;
                left: 0;
                position: absolute;
                right: 0;
                top: 0
            }

            .cropper-canvas,
            .cropper-wrap-box {
                overflow: hidden
            }

            .cropper-drag-box {
                background-color: #fff;
                opacity: 0
            }

            .cropper-modal {
                background-color: #000;
                opacity: .5
            }

            .cropper-view-box {
                display: block;
                height: 100%;
                outline: 1px solid #39f;
                outline-color: rgba(51, 153, 255, 75%);
                overflow: hidden;
                width: 100%
            }

            .cropper-dashed {
                border: 0 dashed #eee;
                display: block;
                opacity: .5;
                position: absolute
            }

            .cropper-dashed.dashed-h {
                border-bottom-width: 1px;
                border-top-width: 1px;
                height: 33.33333%;
                left: 0;
                top: 33.33333%;
                width: 100%
            }

            .cropper-dashed.dashed-v {
                border-left-width: 1px;
                border-right-width: 1px;
                height: 100%;
                left: 33.33333%;
                top: 0;
                width: 33.33333%
            }

            .cropper-center {
                display: block;
                height: 0;
                left: 50%;
                opacity: .75;
                position: absolute;
                top: 50%;
                width: 0
            }

            .cropper-center:after,
            .cropper-center:before {
                background-color: #eee;
                content: " ";
                display: block;
                position: absolute
            }

            .cropper-center:before {
                height: 1px;
                left: -3px;
                top: 0;
                width: 7px
            }

            .cropper-center:after {
                height: 7px;
                left: 0;
                top: -3px;
                width: 1px
            }

            .cropper-face,
            .cropper-line,
            .cropper-point {
                display: block;
                height: 100%;
                opacity: .1;
                position: absolute;
                width: 100%
            }

            .cropper-face {
                background-color: #fff;
                left: 0;
                top: 0
            }

            .cropper-line {
                background-color: #39f
            }

            .cropper-line.line-e {
                cursor: ew-resize;
                right: -3px;
                top: 0;
                width: 5px
            }

            .cropper-line.line-n {
                cursor: ns-resize;
                height: 5px;
                left: 0;
                top: -3px
            }

            .cropper-line.line-w {
                cursor: ew-resize;
                left: -3px;
                top: 0;
                width: 5px
            }

            .cropper-line.line-s {
                bottom: -3px;
                cursor: ns-resize;
                height: 5px;
                left: 0
            }

            .cropper-point {
                background-color: #39f;
                height: 5px;
                opacity: .75;
                width: 5px
            }

            .cropper-point.point-e {
                cursor: ew-resize;
                margin-top: -3px;
                right: -3px;
                top: 50%
            }

            .cropper-point.point-n {
                cursor: ns-resize;
                left: 50%;
                margin-left: -3px;
                top: -3px
            }

            .cropper-point.point-w {
                cursor: ew-resize;
                left: -3px;
                margin-top: -3px;
                top: 50%
            }

            .cropper-point.point-s {
                bottom: -3px;
                cursor: s-resize;
                left: 50%;
                margin-left: -3px
            }

            .cropper-point.point-ne {
                cursor: nesw-resize;
                right: -3px;
                top: -3px
            }

            .cropper-point.point-nw {
                cursor: nwse-resize;
                left: -3px;
                top: -3px
            }

            .cropper-point.point-sw {
                bottom: -3px;
                cursor: nesw-resize;
                left: -3px
            }

            .cropper-point.point-se {
                bottom: -3px;
                cursor: nwse-resize;
                height: 20px;
                opacity: 1;
                right: -3px;
                width: 20px
            }

            @media (min-width:768px) {
                .cropper-point.point-se {
                    height: 15px;
                    width: 15px
                }
            }

            @media (min-width:992px) {
                .cropper-point.point-se {
                    height: 10px;
                    width: 10px
                }
            }

            @media (min-width:1200px) {
                .cropper-point.point-se {
                    height: 5px;
                    opacity: .75;
                    width: 5px
                }
            }

            .cropper-point.point-se:before {
                background-color: #39f;
                bottom: -50%;
                content: " ";
                display: block;
                height: 200%;
                opacity: 0;
                position: absolute;
                right: -50%;
                width: 200%
            }

            .cropper-invisible {
                opacity: 0
            }

            .cropper-bg {
                background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQAQMAAAAlPW0iAAAAA3NCSVQICAjb4U/gAAAABlBMVEXMzMz////TjRV2AAAACXBIWXMAAArrAAAK6wGCiw1aAAAAHHRFWHRTb2Z0d2FyZQBBZG9iZSBGaXJld29ya3MgQ1M26LyyjAAAABFJREFUCJlj+M/AgBVhF/0PAH6/D/HkDxOGAAAAAElFTkSuQmCC")
            }

            .cropper-hide {
                display: block;
                height: 0;
                position: absolute;
                width: 0
            }

            .cropper-hidden {
                display: none !important
            }

            .cropper-move {
                cursor: move
            }

            .cropper-crop {
                cursor: crosshair
            }

            .cropper-disabled .cropper-drag-box,
            .cropper-disabled .cropper-face,
            .cropper-disabled .cropper-line,
            .cropper-disabled .cropper-point {
                cursor: not-allowed
            }
        </style>
        <style type="text/css">
            .cropper {
                display: flex;
                flex-direction: column;
                grid-gap: 12px;
                gap: 12px;
                height: 100%;
                width: 100%;
                min-height: 30px
            }

            .cropper__image-container {
                width: 100%;
                max-height: calc(100vh - 200px)
            }

            @media (max-width:500px) {
                .cropper__image-container {
                    max-height: calc(100vh - 160px)
                }
            }

            .cropper__image-container--transparent {
                opacity: 0
            }

            .cropper__image {
                display: block;
                max-width: 100%
            }

            .cropper__actions-container {
                display: flex;
                align-items: center;
                justify-content: space-between;
                flex-wrap: wrap;
                grid-row-gap: 12px;
                row-gap: 12px
            }

            .cropper__actions {
                display: flex;
                align-items: center;
                grid-gap: 16px;
                gap: 16px
            }

            .cropper__action {
                color: var(--color-primary)
            }

            .cropper__loader {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translateX(-50%) translateY(-50%)
            }

            .cropper__error {
                color: var(--color-red);
                font-size: 14px
            }

            .cropper__error b {
                font-weight: 500
            }

            .cropper .cropper__image-container .cropper-crop-box .cropper-view-box {
                outline: 2px dashed var(--color-primary);
                outline-color: var(--color-primary)
            }

            .cropper .cropper__image-container .cropper-crop-box .cropper-line {
                background: transparent
            }

            .cropper .cropper__image-container .cropper-crop-box .cropper-point {
                background-color: var(--color-primary)
            }

            .cropper.cropper-circled .cropper__image-container .cropper-crop-box .cropper-face.cropper-move,
            .cropper.cropper-circled .cropper__image-container .cropper-crop-box .cropper-view-box {
                border-radius: 50%
            }

            .cropper.cropper-circled .cropper__image-container .cropper-crop-box .cropper-point.point-ne,
            .cropper.cropper-circled .cropper__image-container .cropper-crop-box .cropper-point.point-nw,
            .cropper.cropper-circled .cropper__image-container .cropper-crop-box .cropper-point.point-se,
            .cropper.cropper-circled .cropper__image-container .cropper-crop-box .cropper-point.point-sw {
                display: none
            }

            .cropper.cropper-circled .cropper__image-container .cropper-crop-box .cropper-point.point-e {
                width: 15px;
                height: 15px;
                right: -8px;
                margin-top: -8px;
                opacity: 1
            }
        </style>
        <style type="text/css">
            .image-cropper-modal {
                padding: 12px
            }

            .image-cropper-modal__actions {
                display: flex;
                align-items: center;
                grid-gap: 8px;
                gap: 8px
            }
        </style>
        <style type="text/css">
            .image-picker {
                height: 140px;
                width: 100%;
                border-radius: 8px;
                position: relative;
                display: flex;
                overflow: hidden
            }

            .image-picker__preview {
                width: 100%;
                height: 100%;
                -o-object-fit: cover;
                object-fit: cover;
                -o-object-position: center;
                object-position: center
            }

            .image-picker__button {
                --button-size: 16px;
                color: var(--color-text);
                font-size: 12px;
                position: absolute;
                display: flex;
                align-items: center;
                justify-content: center;
                top: 4px;
                height: var(--button-size);
                border: none;
                border-radius: var(--radius-sx);
                background: var(--color-white);
                transition: background .25s
            }

            .image-picker__button-edit {
                right: 38px;
                padding: 12px;
                border: 1px dashed var(--color-text)
            }

            html[dir=rtl] .image-picker__button-edit {
                left: 38px;
                right: auto
            }

            .image-picker__button-remove {
                right: 4px;
                padding: 12px 6px;
                border: 1px dashed var(--color-text)
            }

            .image-picker__button-remove svg {
                color: var(--color-text);
                width: var(--button-size);
                height: var(--button-size)
            }

            html[dir=rtl] .image-picker__button-remove {
                left: 4px;
                right: auto
            }

            .image-picker__button:hover {
                background: var(--color-white)
            }

            .image-picker-dropzone {
                border-radius: var(--radius-sm);
                width: 100%;
                height: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
                position: relative
            }

            ._attached .image-picker-dropzone {
                display: none
            }

            .image-picker-dropzone__text {
                font-size: 18px;
                color: var(--color-gray-text);
                font-weight: 400;
                padding: 0 12px;
                text-align: center
            }

            .image-picker-dropzone__error {
                color: var(--color-red);
                bottom: 16px;
                position: absolute;
                text-align: center;
                padding: 0 8px
            }

            .image-picker-dropzone__overlay {
                width: 100%;
                height: 100%;
                position: absolute;
                left: 0;
                top: 0;
                border: 2px dashed var(--color-gray-stroke);
                border-radius: var(--radius-sm);
                transition: box-shadow .25s
            }

            .image-picker-dropzone__input {
                width: .1px;
                height: .1px;
                opacity: 0;
                overflow: hidden;
                position: absolute;
                z-index: -1
            }

            .image-picker-dropzone__input:focus+.image-picker-dropzone__overlay {
                box-shadow: var(--shadow-light)
            }
        </style>
        <style type="text/css">
            .base-form-checkbox {
                display: inline-flex;
                position: relative;
                align-items: center;
                cursor: pointer;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
                grid-gap: 12px;
                gap: 12px
            }

            .base-form-checkbox__button {
                width: 21px;
                height: 21px;
                display: flex;
                position: relative;
                background: var(--color-white);
                border: 1px solid var(--color-gray-400);
                border-radius: 4px;
                flex-shrink: 0;
                transition: box-shadow .25s;
                --borderWidth: 2px;
                --borderColor: var(--color-primary)
            }

            .base-form-checkbox__button:after {
                content: "";
                position: absolute;
                left: 7px;
                top: 4px;
                display: inline-block;
                transform: rotate(48deg) scale(1.1) translateY(-2px);
                height: 10px;
                width: 5px;
                border-bottom: var(--borderWidth) solid var(--borderColor);
                border-right: var(--borderWidth) solid var(--borderColor);
                opacity: 0;
                transition: transform .25s, opacity .25s
            }

            ._checked .base-form-checkbox__button:after {
                opacity: 1;
                transform: rotate(48deg) scale(1) translateY(0)
            }

            .base-form-checkbox__text {
                font-size: 14px;
                line-height: 1.2;
                color: var(--color-gray-500)
            }

            .base-form-checkbox__text:empty {
                display: none
            }

            .base-form-row--error .base-form-checkbox__text span {
                box-shadow: 0 2px 0 var(--color-red)
            }

            .base-form-checkbox--dark .base-form-checkbox__button {
                background: var(--color-primary-dark)
            }

            .base-form-checkbox--dark .base-form-checkbox__button:after {
                background: var(--color-white)
            }

            .base-form-checkbox--dark._checked .base-form-checkbox__button {
                background: var(--color-primary-dark)
            }

            .base-form-checkbox--dark._checked .base-form-checkbox__button:after {
                background: var(--color-white)
            }

            .base-form-checkbox._disabled {
                cursor: default;
                pointer-events: none
            }

            .base-form-checkbox._disabled .base-form-checkbox-button {
                background: var(--color-gray-hover) !important
            }

            .base-form-checkbox._disabled .base-form-checkbox-button:after {
                background: var(--color-gray-text) !important
            }

            .base-form-checkbox__input {
                opacity: 0;
                width: 100%;
                height: 100%;
                position: absolute;
                left: 0;
                top: 0;
                cursor: pointer
            }
        </style>
        <style type="text/css">
            .place-edit-modal__checkbox {
                margin-top: 26px
            }

            .place-edit-modal__theme .base-form-label {
                display: flex;
                flex-wrap: wrap
            }

            .place-edit-modal__theme .base-form-label__name {
                width: 100%
            }

            .place-edit-modal__theme .base-form-input:not(:last-child) {
                width: calc(100% - 48px);
                border-radius: 8px 0 0 8px
            }

            .place-edit-modal__theme .base-form-input:last-child {
                flex-shrink: 0;
                width: 48px;
                border-radius: 0 8px 8px 0
            }

            .place-edit-modal__logo .image-picker {
                justify-content: center;
                align-items: center
            }

            .place-edit-modal__logo .image-picker__preview {
                width: 82px;
                height: 82px;
                border-radius: 100%
            }

            .place-edit-modal__fields-group {
                flex: 1;
                display: flex;
                flex-direction: column;
                grid-gap: 12px 18px;
                gap: 12px 18px
            }

            .place-edit-modal__loader {
                width: 100%;
                height: 100%;
                padding: 32px 0;
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column
            }

            .place-edit-modal .place-edit-modal__textarea-wrapper textarea {
                height: 156px
            }

            .place-edit-modal .place-edit-modal__textarea-wrapper--small span {
                line-height: 1.4
            }

            .place-edit-modal .place-edit-modal__textarea-wrapper--small textarea {
                height: 100px
            }
        </style>
        <style type="text/css">
            .remove-item-modal__description {
                margin: 0;
                color: #676767
            }

            @media (max-width:500px) {
                .remove-item-modal__description {
                    text-align: center
                }
            }
        </style>
        <style type="text/css">
            .base-lazy {
                position: relative
            }

            .base-lazy__loader {
                position: absolute;
                left: 0;
                top: 0;
                display: block;
                width: 100%;
                height: 100%;
                border-radius: 16px;
                animation-duration: .8s;
                animation-fill-mode: forwards;
                animation-iteration-count: 4;
                animation-name: placeHolderShimmer;
                animation-timing-function: linear;
                background: var(--color-gray-hover);
                background: linear-gradient(90deg, var(--color-gray-hover) 10%, var(--color-gray-bg) 18%, var(--color-gray-hover) 33%);
                background-size: 800px 104px
            }

            .base-lazy img {
                position: relative;
                opacity: 0;
                transition: opacity .25s
            }

            .base-lazy._loaded img {
                opacity: 1
            }
        </style>
        <style type="text/css">
            .menu-item-image {
                flex-shrink: 0;
                display: flex;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
                position: relative;
                margin-bottom: 10px;
                width: 100%;
                overflow: hidden;
                aspect-ratio: 1.61/1
            }

            .menu-item-image .base-lazy__loader,
            .menu-item-image img {
                border-radius: var(--radius-xl)
            }

            .menu-item-image img {
                width: 100%;
                height: 100%;
                -o-object-fit: cover;
                object-fit: cover;
                -o-object-position: center;
                object-position: center;
                box-shadow: var(--shadow-0)
            }
        </style>
        <style type="text/css">
            .menu-item-price {
                font-weight: 500;
                display: flex;
                align-items: center;
                line-height: 1
            }

            .menu-item-price__current {
                display: flex;
                align-items: flex-start;
                color: var(--color-primary)
            }

            .menu-item-price__current b {
                font-weight: 500
            }

            .menu-item-price__current span {
                margin-left: 2px;
                font-weight: 400
            }

            .menu-item-price__old {
                display: flex;
                align-items: flex-start;
                margin-left: 6px;
                font-weight: 400;
                color: var(--color-gray-400)
            }

            .menu-item-price__old b {
                font-weight: 400;
                text-decoration: line-through
            }

            .menu-item-price__old span {
                margin-left: 2px
            }

            .menu-item-price--small .menu-item-price__current {
                font-size: 18px
            }

            .menu-item-price--small .menu-item-price__current span {
                font-size: 12px
            }

            .menu-item-price--small .menu-item-price__old {
                font-size: 14px
            }

            .menu-item-price--small .menu-item-price__old span {
                font-size: 12px
            }

            .menu-item-price--regular .menu-item-price__current {
                font-size: 24px
            }

            .menu-item-price--regular .menu-item-price__current span,
            .menu-item-price--regular .menu-item-price__old {
                font-size: 16px
            }

            .menu-item-price--regular .menu-item-price__old span {
                font-size: 12px
            }
        </style>
        <style type="text/css">
            .menu-item-description {
                position: relative;
                margin-bottom: 6px;
                color: var(--color-gray-500);
                font-size: 14px;
                overflow: hidden
            }

            .menu-item-description p {
                margin: 0;
                line-height: 1.46
            }

            .menu-item-description p:not(:last-child) {
                margin: 0 0 10px
            }

            .menu-item-description._has-big-description:after {
                position: absolute;
                content: "";
                width: 100%;
                height: 48px;
                bottom: 0;
                left: 0;
                background: linear-gradient(180deg, var(--color-white), hsla(0, 0%, 100%, 0) 0, var(--color-white))
            }

            .menu-item-description._is-description-open {
                display: block;
                overflow: visible;
                height: auto
            }

            .menu-item-description._is-description-open:after {
                display: none
            }
        </style>
        <style type="text/css">
            .menu-item-weight {
                color: var(--color-gray-400);
                font-size: 14px;
                flex-shrink: 0;
                white-space: nowrap
            }
        </style>
        <style type="text/css">
            .menu-item-title {
                font-size: 16px;
                font-weight: 600;
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
                flex-grow: 1;
                margin: 0
            }

            .menu-item-title__icon {
                display: inline-block;
                vertical-align: text-bottom
            }
        </style>
        <style type="text/css">
            .order-action {
                display: flex;
                align-items: center;
                justify-content: center;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
                column-gap: 20px;
            }

            .order-action-count {
                font-weight: 500;
                color: var(--color-primary);
                text-align: center;
                opacity: 0;
                visibility: hidden;
                transform: translateX(12px);
                right: 1000px;
                transition: transform .25s, opacity .25s, visibility .25s, color .25s
            }

            .order-action--value .order-action-count {
                opacity: 1;
                visibility: visible;
                transform: translate(0)
            }

            .order-action--regular .order-action-count {
                font-size: 26px;
                width: 37px;
                transform: none;
            }

            .order-action--small .order-action-count {
                font-size: 20px;
                width: 32px
            }

            .order-action--tiny .order-action-count {
                font-size: 16px;
                width: 24px
            }

            .order-action-button {
                position: relative;
                border: none;
                z-index: 1;
                width: 38px;
                height: 38px;
                border-radius: 100%;
                display: flex;
                justify-content: center;
                align-items: baseline;
                padding: 0;
                cursor: pointer;
                box-shadow: var(--shadow-0);
                color: var(--color-primary)
            }

            .order-action-button:before {
                content: "";
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                border-radius: 100%;
                opacity: 0;
                transition: opacity .25s;
                background: var(--color-primary)
            }

            .order-action--value .order-action-button {
                background: var(--color-white);
                box-shadow: none;
                align-items: center
            }

            .order-action--regular .order-action-button {
                font-size: 32px;
                transform: none !important;
            }

            .order-action--small .order-action-button {
                font-size: 24px
            }

            .order-action--tiny .order-action-button {
                font-size: 16px;
                width: 24px;
                height: 24px
            }

            .order-action-button:hover {
                background: transparent
            }

            @media (min-width:601px) {
                .order-action-button:hover:before {
                    opacity: .05
                }
            }

            .order-action-button:after {
                pointer-events: all
            }

            @media (min-width:601px) {
                .order-action-button:after {
                    pointer-events: none
                }
            }

            .order-action-button._add {
                box-shadow: var(--shadow-2);
                background: var(--color-primary);
                transition: background .25s;
                color: var(--color-white)
            }

            .order-action--value .order-action-button._add {
                box-shadow: none;
                background: var(--color-white);
                color: var(--color-primary)
            }

            .order-action-button._remove {
                opacity: 0;
                visibility: hidden;
                transform: translateX(12px);
                transition: transform .25s, opacity .25s, visibility .25s, background .25s
            }

            .order-action--value .order-action-button._remove {
                opacity: 1;
                visibility: visible;
                transform: translate(0)
            }
        </style>
        <style type="text/css">
            .base-form-checkbox {
                display: inline-flex;
                position: relative;
                align-items: center;
                cursor: pointer;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
                grid-gap: 12px;
                gap: 12px
            }

            .base-form-checkbox__button {
                width: 21px;
                height: 21px;
                display: flex;
                position: relative;
                background: var(--color-white);
                border: 1px solid var(--color-gray-400);
                border-radius: 4px;
                flex-shrink: 0;
                transition: box-shadow .25s;
                --borderWidth: 2px;
                --borderColor: var(--color-primary)
            }

            .base-form-checkbox__button:after {
                content: "";
                position: absolute;
                left: 7px;
                top: 4px;
                display: inline-block;
                transform: rotate(48deg) scale(1.1) translateY(-2px);
                height: 10px;
                width: 5px;
                border-bottom: var(--borderWidth) solid var(--borderColor);
                border-right: var(--borderWidth) solid var(--borderColor);
                opacity: 0;
                transition: transform .25s, opacity .25s
            }

            ._checked .base-form-checkbox__button:after {
                opacity: 1;
                transform: rotate(48deg) scale(1) translateY(0)
            }

            .base-form-checkbox__text {
                font-size: 14px;
                line-height: 1.2;
                color: var(--color-gray-500)
            }

            .base-form-checkbox__text:empty {
                display: none
            }

            .base-form-row--error .base-form-checkbox__text span {
                box-shadow: 0 2px 0 var(--color-red)
            }

            .base-form-checkbox--dark .base-form-checkbox__button {
                background: var(--color-primary-dark)
            }

            .base-form-checkbox--dark .base-form-checkbox__button:after {
                background: var(--color-white)
            }

            .base-form-checkbox--dark._checked .base-form-checkbox__button {
                background: var(--color-primary-dark)
            }

            .base-form-checkbox--dark._checked .base-form-checkbox__button:after {
                background: var(--color-white)
            }

            .base-form-checkbox._disabled {
                cursor: default;
                pointer-events: none
            }

            .base-form-checkbox._disabled .base-form-checkbox-button {
                background: var(--color-gray-hover) !important
            }

            .base-form-checkbox._disabled .base-form-checkbox-button:after {
                background: var(--color-gray-text) !important
            }

            .base-form-checkbox__input {
                opacity: 0;
                width: 100%;
                height: 100%;
                position: absolute;
                left: 0;
                top: 0;
                cursor: pointer
            }
        </style>
        <style type="text/css">
            .base-form-radio {
                display: inline-flex;
                position: relative;
                align-items: center;
                cursor: pointer;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
                grid-gap: 12px;
                gap: 12px
            }

            .base-form-radio__button {
                width: 21px;
                height: 21px;
                display: flex;
                position: relative;
                background: var(--color-white);
                border: 1px solid var(--color-gray-400);
                border-radius: 50%;
                flex-shrink: 0;
                transition: box-shadow .25s
            }

            .base-form-radio__button:after {
                content: "";
                position: absolute;
                left: 4px;
                top: 4px;
                display: inline-block;
                background: var(--color-primary);
                border-radius: 50%;
                transform: scale(.5);
                height: 11px;
                width: 11px;
                opacity: 0;
                transition: transform .25s, opacity .25s
            }

            ._checked .base-form-radio__button:after {
                opacity: 1;
                transform: scale(1)
            }

            .base-form-radio__text {
                font-size: 14px;
                line-height: 1.2;
                color: var(--color-gray-500)
            }

            .base-form-radio__text:empty {
                display: none
            }

            .base-form-row--error .base-form-radio__text span {
                box-shadow: 0 2px 0 var(--color-red)
            }

            .base-form-radio--dark .base-form-radio__button {
                background: var(--color-primary-dark)
            }

            .base-form-radio--dark .base-form-radio__button:after {
                background: var(--color-white)
            }

            .base-form-radio--dark._checked .base-form-radio__button {
                background: var(--color-primary-dark)
            }

            .base-form-radio--dark._checked .base-form-radio__button:after {
                background: var(--color-white)
            }

            .base-form-radio._disabled {
                cursor: default;
                pointer-events: none
            }

            .base-form-radio._disabled .base-form-radio-button {
                background: var(--color-gray-hover) !important
            }

            .base-form-radio._disabled .base-form-radio-button:after {
                background: var(--color-gray-text) !important
            }

            .base-form-radio__input {
                opacity: 0;
                width: 100%;
                height: 100%;
                position: absolute;
                left: 0;
                top: 0;
                cursor: pointer
            }
        </style>
        <style type="text/css">
            .menu-item-addon-option {
                display: flex
            }

            .menu-item-addon-option__info {
                display: flex;
                justify-content: space-between;
                align-items: center;
                width: 100%
            }

            .menu-item-addon-option__info .base-form-checkbox__text {
                font-size: 16px
            }

            .menu-item-addon-option__row,
            .menu-item-addon-option__row span {
                width: 100%
            }

            .menu-item-addon-option__form-label {
                display: flex;
                justify-content: space-between;
                align-items: center;
                width: 100%
            }

            .menu-item-addon-option__order-multi-row {
                display: flex;
                justify-content: space-between;
                align-items: flex-start;
                padding-top: 5px;
                min-height: 31px
            }

            .menu-item-addon-option__order-data-wrapper {
                color: var(--color-gray-500);
                display: flex;
                align-items: center;
                grid-gap: 12px;
                gap: 12px
            }
        </style>
        <style type="text/css">
            .menu-item-addon {
                display: flex;
                flex-direction: column;
                grid-gap: 12px;
                gap: 12px
            }

            .menu-item-addon__title {
                margin: 0;
                font-size: 16px;
                font-weight: 500
            }

            .menu-item-addon__options {
                display: flex;
                flex-direction: column;
                grid-gap: 10px;
                gap: 10px
            }
        </style>
        <style type="text/css">
            .menu-item-variant {
                display: flex;
                justify-content: space-between;
                align-items: center
            }

            .menu-item-variant__radio,
            .menu-item-variant__radio span {
                width: 100%
            }

            .menu-item-variant__radio-label {
                display: flex;
                justify-content: space-between;
                align-items: center
            }

            .menu-item-variant .base-form-radio__text,
            .menu-item-variant__title {
                font-size: 16px;
                padding: 4px 0;
                font-weight: 500
            }

            .menu-item-variant .base-form-radio {
                width: 100%
            }
        </style>
        <style type="text/css">
            @media screen and (max-width:540px) {
                .menu-item-modal .base-modal__main {
                    margin: 0;
                    height: 100dvh !important;
                    max-height: 100dvh;
                    border-radius: 0;
                    padding: 16px 8px 16px 16px
                }
            }

            .menu-item-modal .base-modal__header-close {
                top: 8px;
                right: 8px;
                background: var(--color-white);
                width: 40px;
                height: 40px;
                border-radius: 100%;
                box-shadow: var(--shadow-2)
            }

            .menu-item-modal .base-modal__header-close svg {
                width: 26px;
                height: 26px
            }

            .menu-item-modal .base-modal__header-close svg line {
                stroke: var(--color-black)
            }

            .menu-item-modal--img .menu-item-modal .base-modal__header-close {
                top: 32px;
                right: 32px
            }

            .menu-item-modal .base-modal__footer {
                justify-content: center
            }

            .menu-item-modal-image img {
                border-radius: var(--radius-xl);
                width: 100%;
                height: 100%;
                -o-object-fit: cover;
                object-fit: cover;
                -o-object-position: center;
                object-position: center;
                box-shadow: var(--shadow-0)
            }

            .menu-item-modal__header {
                display: flex;
                flex-direction: column;
                grid-gap: 6px;
                gap: 6px
            }

            .menu-item-modal__title {
                display: flex;
                grid-gap: 16px;
                gap: 16px;
                padding-right: 52px
            }

            .menu-item-modal--img .menu-item-modal__title {
                padding-right: 0
            }

            .menu-item-modal__title .menu-item-title {
                font-size: 24px;
                line-height: 26px
            }

            .menu-item-modal__description {
                display: flex;
                flex-direction: column;
                grid-gap: 8px;
                gap: 8px
            }

            .menu-item-modal__addons {
                display: flex;
                flex-direction: column;
                grid-gap: 24px;
                gap: 24px;
                margin-top: 38px
            }

            .menu-item-modal__variants {
                display: flex;
                flex-direction: column;
                grid-gap: 16px;
                gap: 16px;
                margin-top: 24px
            }

            .menu-item-modal__footer {
                width: 100%;
                display: flex;
                justify-content: center
            }

            .menu-item-modal__footer .base-button {
                box-shadow: var(--shadow-2)
            }
        </style>
        <style type="text/css">
            .panel-layout-nav-item {
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
                display: flex;
                border: none;
                align-items: center;
                transition: color .25s ease, background-color .25s ease
            }

            .panel-layout-nav-item svg {
                flex-shrink: 0
            }

            .panel-layout-nav-item--sidebar {
                width: 100%;
                justify-content: flex-start;
                flex-shrink: 0;
                height: 41px;
                font-weight: 500;
                padding: 0 16px;
                border-radius: var(--radius-sm);
                grid-gap: 8px;
                gap: 8px;
                white-space: nowrap
            }

            .panel-layout-nav-item--sidebar span {
                font-size: 14px
            }

            .panel-layout-nav-item--sidebar.nuxt-link-active,
            .panel-layout-nav-item--sidebar:hover {
                background: var(--color-primary-100)
            }

            .panel-layout-nav-item--footer {
                width: 64px;
                flex: 1;
                flex-direction: column;
                justify-content: center;
                grid-gap: 2px;
                gap: 2px;
                border-radius: 0;
                padding: 0;
                height: 100%
            }

            .panel-layout-nav-item--footer span {
                font-size: 10px;
                font-weight: 500
            }

            .panel-layout-nav-item--footer.nuxt-link-active,
            .panel-layout-nav-item--footer:hover {
                background: transparent;
                color: var(--color-primary)
            }

            .panel-layout-nav-item--disabled {
                pointer-events: none;
                opacity: .5
            }
        </style>
        <style type="text/css">
            .panel-layout-nav--sidebar {
                display: flex;
                flex-direction: column;
                height: 100%;
                grid-gap: 6px;
                gap: 6px
            }
        </style>
        <style type="text/css">
            .panel-layout-footer {
                width: 100%;
                position: fixed;
                display: flex;
                justify-content: center;
                bottom: 0;
                left: 0;
                padding-bottom: env(safe-area-inset-bottom);
                z-index: 11;
                background: var(--color-white);
                box-shadow: var(--shadow-0-top)
            }

            .panel-layout-footer .panel-layout-nav {
                display: flex;
                flex-direction: row;
                justify-content: space-between;
                align-items: center;
                width: 100%;
                height: 56px;
                background: transparent;
                border-radius: 0;
                max-width: var(--max-content-width);
                box-shadow: none
            }

            html[dir=rtl] .panel-layout-footer .panel-layout-nav {
                flex-direction: row-reverse
            }
        </style>
        <style type="text/css">
            .close-panel-button.icon-button {
                padding: 10px;
                color: var(--color-black)
            }
        </style>
        <style type="text/css">
            .addon-upsert-modal-title {
                text-align: center;
                margin: 0 0 32px;
                width: 100%
            }

            .addon-upsert-modal-form,
            .addon-upsert-modal-form__options {
                display: flex;
                flex-direction: column
            }

            .addon-upsert-modal-form__options {
                grid-gap: 18px;
                gap: 18px;
                margin-top: 28px
            }

            .addon-upsert-modal-form__actions {
                margin-top: 18px
            }

            .addon-upsert-modal-form__actions .base-button {
                width: 100%
            }

            .addon-upsert-modal-form__block {
                display: flex;
                flex-wrap: wrap;
                flex-direction: column;
                align-items: flex-start;
                grid-gap: 12px;
                gap: 12px
            }

            @media (min-width:500px) {
                .addon-upsert-modal-form__block {
                    flex-direction: row
                }
            }

            .addon-upsert-modal-form__block-header {
                flex-direction: column
            }

            @media (min-width:500px) {
                .addon-upsert-modal-form__block-header {
                    flex-direction: row-reverse
                }
            }

            .addon-upsert-modal-form__col {
                flex: 1;
                display: flex;
                flex-direction: column;
                grid-gap: 12px;
                gap: 12px;
                width: 100%
            }

            @media (min-width:500px) {
                .addon-upsert-modal-form__col {
                    width: auto
                }
            }

            @media (min-width:500px) {
                .addon-upsert-modal-form__col-fixed-width {
                    max-width: 172px
                }
            }

            .addon-upsert-modal-form-option {
                display: flex;
                grid-gap: 12px;
                gap: 12px;
                align-items: center
            }

            @media (min-width:500px) {
                .addon-upsert-modal-form-option {
                    margin-top: 22px
                }
            }

            .addon-upsert-modal__loader {
                width: 100%;
                height: 100%;
                padding: 32px 0;
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column
            }

            .addon-upsert-modal .base-form-input--prefix {
                padding-left: 10px
            }
        </style>
        <style type="text/css">
            :root {
                --vs-colors--lightest: rgba(60, 60, 60, 0.26);
                --vs-colors--light: rgba(60, 60, 60, 0.5);
                --vs-colors--dark: #333;
                --vs-colors--darkest: rgba(0, 0, 0, 0.15);
                --vs-search-input-color: inherit;
                --vs-search-input-bg: #fff;
                --vs-search-input-placeholder-color: inherit;
                --vs-font-size: 1rem;
                --vs-line-height: 1.4;
                --vs-state-disabled-bg: #f8f8f8;
                --vs-state-disabled-color: var(--vs-colors--light);
                --vs-state-disabled-controls-color: var(--vs-colors--light);
                --vs-state-disabled-cursor: not-allowed;
                --vs-border-color: var(--vs-colors--lightest);
                --vs-border-width: 1px;
                --vs-border-style: solid;
                --vs-border-radius: 4px;
                --vs-actions-padding: 4px 6px 0 3px;
                --vs-controls-color: var(--vs-colors--light);
                --vs-controls-size: 1;
                --vs-controls--deselect-text-shadow: 0 1px 0 #fff;
                --vs-selected-bg: #f0f0f0;
                --vs-selected-color: var(--vs-colors--dark);
                --vs-selected-border-color: var(--vs-border-color);
                --vs-selected-border-style: var(--vs-border-style);
                --vs-selected-border-width: var(--vs-border-width);
                --vs-dropdown-bg: #fff;
                --vs-dropdown-color: inherit;
                --vs-dropdown-z-index: 1000;
                --vs-dropdown-min-width: 160px;
                --vs-dropdown-max-height: 350px;
                --vs-dropdown-box-shadow: 0px 3px 6px 0px var(--vs-colors--darkest);
                --vs-dropdown-option-bg: #000;
                --vs-dropdown-option-color: var(--vs-dropdown-color);
                --vs-dropdown-option-padding: 3px 20px;
                --vs-dropdown-option--active-bg: #5897fb;
                --vs-dropdown-option--active-color: #fff;
                --vs-dropdown-option--deselect-bg: #fb5858;
                --vs-dropdown-option--deselect-color: #fff;
                --vs-transition-timing-function: cubic-bezier(1, -0.115, 0.975, 0.855);
                --vs-transition-duration: 150ms
            }

            .v-select {
                font-family: inherit;
                position: relative
            }

            .v-select,
            .v-select * {
                box-sizing: border-box
            }

            :root {
                --vs-transition-timing-function: cubic-bezier(1, 0.5, 0.8, 1);
                --vs-transition-duration: 0.15s
            }

            @keyframes vSelectSpinner {
                0% {
                    transform: rotate(0deg)
                }

                to {
                    transform: rotate(1turn)
                }
            }

            .vs__fade-enter-active,
            .vs__fade-leave-active {
                pointer-events: none;
                transition: opacity .15s cubic-bezier(1, .5, .8, 1);
                transition: opacity var(--vs-transition-duration) var(--vs-transition-timing-function)
            }

            .vs__fade-enter,
            .vs__fade-leave-to {
                opacity: 0
            }

            :root {
                --vs-disabled-bg: var(--vs-state-disabled-bg);
                --vs-disabled-color: var(--vs-state-disabled-color);
                --vs-disabled-cursor: var(--vs-state-disabled-cursor)
            }

            .vs--disabled .vs__clear,
            .vs--disabled .vs__dropdown-toggle,
            .vs--disabled .vs__open-indicator,
            .vs--disabled .vs__search,
            .vs--disabled .vs__selected {
                background-color: #f8f8f8;
                background-color: var(--vs-disabled-bg);
                cursor: not-allowed;
                cursor: var(--vs-disabled-cursor)
            }

            .v-select[dir=rtl] .vs__actions {
                padding: 0 3px 0 6px
            }

            .v-select[dir=rtl] .vs__clear {
                margin-left: 6px;
                margin-right: 0
            }

            .v-select[dir=rtl] .vs__deselect {
                margin-left: 0;
                margin-right: 2px
            }

            .v-select[dir=rtl] .vs__dropdown-menu {
                text-align: right
            }

            .vs__dropdown-toggle {
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                background: #fff;
                background: var(--vs-search-input-bg);
                border: 1px solid rgba(60, 60, 60, .26);
                border: var(--vs-border-width) var(--vs-border-style) var(--vs-border-color);
                border-radius: 4px;
                border-radius: var(--vs-border-radius);
                display: flex;
                padding: 0 0 4px;
                white-space: normal
            }

            .vs__selected-options {
                display: flex;
                flex-basis: 100%;
                flex-grow: 1;
                flex-wrap: wrap;
                padding: 0 2px;
                position: relative
            }

            .vs__actions {
                align-items: center;
                display: flex;
                padding: 4px 6px 0 3px;
                padding: var(--vs-actions-padding)
            }

            .vs--searchable .vs__dropdown-toggle {
                cursor: text
            }

            .vs--unsearchable .vs__dropdown-toggle {
                cursor: pointer
            }

            .vs--open .vs__dropdown-toggle {
                border-bottom-color: transparent;
                border-bottom-left-radius: 0;
                border-bottom-right-radius: 0
            }

            .vs__open-indicator {
                fill: rgba(60, 60, 60, .5);
                fill: var(--vs-controls-color);
                transform: scale(1);
                transform: scale(var(--vs-controls-size));
                transition: transform .15s cubic-bezier(1, .5, .8, 1);
                transition: transform var(--vs-transition-duration) var(--vs-transition-timing-function);
                transition-timing-function: cubic-bezier(1, .5, .8, 1);
                transition-timing-function: var(--vs-transition-timing-function)
            }

            .vs--open .vs__open-indicator {
                transform: rotate(180deg) scale(1);
                transform: rotate(180deg) scale(var(--vs-controls-size))
            }

            .vs--loading .vs__open-indicator {
                opacity: 0
            }

            .vs__clear {
                fill: rgba(60, 60, 60, .5);
                fill: var(--vs-controls-color);
                background-color: transparent;
                border: 0;
                cursor: pointer;
                margin-right: 8px;
                padding: 0
            }

            .vs__dropdown-menu {
                background: #fff;
                background: var(--vs-dropdown-bg);
                border: 1px solid rgba(60, 60, 60, .26);
                border: var(--vs-border-width) var(--vs-border-style) var(--vs-border-color);
                border-radius: 0 0 4px 4px;
                border-radius: 0 0 var(--vs-border-radius) var(--vs-border-radius);
                border-top-style: none;
                box-shadow: 0 3px 6px 0 rgba(0, 0, 0, .15);
                box-shadow: var(--vs-dropdown-box-shadow);
                box-sizing: border-box;
                color: inherit;
                color: var(--vs-dropdown-color);
                display: block;
                left: 0;
                list-style: none;
                margin: 0;
                max-height: 350px;
                max-height: var(--vs-dropdown-max-height);
                min-width: 160px;
                min-width: var(--vs-dropdown-min-width);
                overflow-y: auto;
                padding: 5px 0;
                position: absolute;
                text-align: left;
                top: calc(100% - 1px);
                top: calc(100% - var(--vs-border-width));
                width: 100%;
                z-index: 1000;
                z-index: var(--vs-dropdown-z-index)
            }

            .vs__no-options {
                text-align: center
            }

            .vs__dropdown-option {
                clear: both;
                color: inherit;
                color: var(--vs-dropdown-option-color);
                cursor: pointer;
                display: block;
                line-height: 1.42857143;
                padding: 3px 20px;
                padding: var(--vs-dropdown-option-padding);
                white-space: nowrap
            }

            .vs__dropdown-option--highlight {
                background: #5897fb;
                background: var(--vs-dropdown-option--active-bg);
                color: #fff;
                color: var(--vs-dropdown-option--active-color)
            }

            .vs__dropdown-option--deselect {
                background: #fb5858;
                background: var(--vs-dropdown-option--deselect-bg);
                color: #fff;
                color: var(--vs-dropdown-option--deselect-color)
            }

            .vs__dropdown-option--disabled {
                background: #f8f8f8;
                background: var(--vs-state-disabled-bg);
                color: rgba(60, 60, 60, .5);
                color: var(--vs-state-disabled-color);
                cursor: not-allowed;
                cursor: var(--vs-state-disabled-cursor)
            }

            .vs__selected {
                align-items: center;
                background-color: #f0f0f0;
                background-color: var(--vs-selected-bg);
                border: 1px solid rgba(60, 60, 60, .26);
                border: var(--vs-selected-border-width) var(--vs-selected-border-style) var(--vs-selected-border-color);
                border-radius: 4px;
                border-radius: var(--vs-border-radius);
                color: #333;
                color: var(--vs-selected-color);
                display: flex;
                line-height: 1.4;
                line-height: var(--vs-line-height);
                margin: 4px 2px 0;
                padding: 0 .25em;
                z-index: 0
            }

            .vs__deselect {
                fill: rgba(60, 60, 60, .5);
                fill: var(--vs-controls-color);
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                background: none;
                border: 0;
                cursor: pointer;
                display: inline-flex;
                margin-left: 4px;
                padding: 0;
                text-shadow: 0 1px 0 #fff;
                text-shadow: var(--vs-controls--deselect-text-shadow)
            }

            .vs--single .vs__selected {
                background-color: transparent;
                border-color: transparent
            }

            .vs--single.vs--loading .vs__selected,
            .vs--single.vs--open .vs__selected {
                opacity: .4;
                position: absolute
            }

            .vs--single.vs--searching .vs__selected {
                display: none
            }

            .vs__search::-webkit-search-cancel-button {
                display: none
            }

            .vs__search::-ms-clear,
            .vs__search::-webkit-search-decoration,
            .vs__search::-webkit-search-results-button,
            .vs__search::-webkit-search-results-decoration {
                display: none
            }

            .vs__search,
            .vs__search:focus {
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                background: none;
                border: 1px solid transparent;
                border-left: none;
                box-shadow: none;
                color: inherit;
                color: var(--vs-search-input-color);
                flex-grow: 1;
                font-size: 1rem;
                font-size: var(--vs-font-size);
                line-height: 1.4;
                line-height: var(--vs-line-height);
                margin: 4px 0 0;
                max-width: 100%;
                outline: none;
                padding: 0 7px;
                width: 0;
                z-index: 1
            }

            .vs__search::-moz-placeholder {
                color: inherit;
                color: var(--vs-search-input-placeholder-color)
            }

            .vs__search::placeholder {
                color: inherit;
                color: var(--vs-search-input-placeholder-color)
            }

            .vs--unsearchable .vs__search {
                opacity: 1
            }

            .vs--unsearchable:not(.vs--disabled) .vs__search {
                cursor: pointer
            }

            .vs--single.vs--searching:not(.vs--open):not(.vs--loading) .vs__search {
                opacity: .2
            }

            .vs__spinner {
                align-self: center;
                animation: vSelectSpinner 1.1s linear infinite;
                border: .9em solid hsla(0, 0%, 39%, .1);
                border-left-color: rgba(60, 60, 60, .45);
                font-size: 5px;
                opacity: 0;
                overflow: hidden;
                text-indent: -9999em;
                transform: translateZ(0) scale(var(--vs-controls-size));
                transform: translateZ(0) scale(var(--vs-controls--spinner-size, var(--vs-controls-size)));
                transition: opacity .1s
            }

            .vs__spinner,
            .vs__spinner:after {
                border-radius: 50%;
                height: 5em;
                transform: scale(var(--vs-controls-size));
                transform: scale(var(--vs-controls--spinner-size, var(--vs-controls-size)));
                width: 5em
            }

            .vs--loading .vs__spinner {
                opacity: 1
            }
        </style>
        <style type="text/css">
            .base-form-multi-select {
                width: 100%;
                --vs-colors--dark: var(--color-text);
                --vs-line-height: 1;
                --vs-state-disabled-color: var(--vs-colors--light);
                --vs-state-disabled-controls-color: var(--vs-colors--light);
                --vs-border-color: var(--vs-colors--lightest);
                --vs-border-width: 0;
                --vs-border-radius: var(--radius-sm);
                --vs-actions-padding: 4px 6px 0 3px;
                --vs-controls-color: var(--vs-colors--light);
                --vs-controls-size: 1;
                --vs-controls--deselect-text-shadow: 0 1px 0 var(--color-white);
                --vs-selected-bg: #f0f0f0;
                --vs-selected-color: var(--vs-colors--dark);
                --vs-selected-border-color: var(--vs-border-color);
                --vs-selected-border-style: var(--vs-border-style);
                --vs-selected-border-width: var(--vs-border-width);
                --vs-dropdown-bg: var(--color-white);
                --vs-dropdown-color: inherit;
                --vs-dropdown-z-index: 2001;
                --vs-dropdown-min-width: 160px;
                --vs-dropdown-max-height: 220px;
                --vs-dropdown-box-shadow: var(--shadow-3);
                --vs-dropdown-option-bg: var(--color-black);
                --vs-dropdown-option-color: var(--vs-dropdown-color);
                --vs-dropdown-option-padding: 3px 20px;
                --vs-dropdown-option--active-bg: var(--color-primary);
                --vs-dropdown-option--active-color: var(--color-white);
                --vs-transition-timing-function: cubic-bezier(1, -0.115, 0.975, 0.855);
                --vs-transition-duration: 150ms
            }

            .base-form-multi-select .vs__dropdown-toggle {
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                padding: 0;
                background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg width='10' height='5' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M5.054 4.612a.447.447 0 00.268-.114L8.897 1.28A.447.447 0 108.3.615l-3.277 2.95L1.746.615a.447.447 0 10-.598.665l3.576 3.218a.447.447 0 00.33.114z' fill='%23536581' stroke='%23536581' stroke-width='.4'/%3E%3C/svg%3E");
                background-color: var(--color-gray-200);
                background-repeat: no-repeat;
                background-position: calc(100% - 16px) 16px;
                background-size: 12px
            }

            .base-form-multi-select .vs__search {
                margin: 0;
                padding: 0
            }

            .base-form-multi-select .vs__selected-options {
                grid-gap: 4px;
                gap: 4px;
                padding: 0
            }

            .base-form-multi-select .vs__selected {
                margin: 0;
                padding: 8px;
                font-size: 14px;
                background: var(--color-gray-300);
                grid-gap: 4px;
                gap: 4px
            }

            .base-form-multi-select .vs__deselect {
                margin: 2px 0 0
            }

            .base-form-multi-select .vs__deselect svg {
                fill: var(--color-gray-400)
            }

            .base-form-multi-select .vs__dropdown-menu {
                padding: 5px;
                bottom: calc(100% + 6px);
                top: auto;
                border-radius: var(--radius-sx);
                z-index: 2001 !important
            }

            .base-form-multi-select .vs__dropdown-option {
                border-radius: var(--radius-sx);
                font-size: 14px;
                padding: 4px 12px;
                overflow: hidden;
                text-overflow: ellipsis
            }

            .base-form-multi-select .vs__no-options {
                font-size: 14px
            }

            html[dir=rtl] .base-form-multi-select {
                background-position: 16px 50%;
                padding-left: 34px;
                padding-right: 14px
            }

            .base-form-multi-select._empty {
                color: var(--color-gray-400)
            }

            .base-form-multi-select--regular {
                --vs-font-size: 14px
            }

            .base-form-multi-select--regular .vs__dropdown-toggle {
                padding: 11px 34px 11px 14px
            }

            .base-form-multi-select--small {
                --vs-font-size: 12px
            }

            .base-form-multi-select--small .vs__dropdown-toggle {
                padding: 8px 24px 8px 7px;
                background-position: calc(100% - 6px) 50%
            }

            .base-form-multi-select--selected .vs__dropdown-toggle {
                padding-top: 5px;
                padding-bottom: 5px;
                padding-left: 5px
            }

            .base-form-multi-select.vs--open .vs__dropdown-toggle {
                border-radius: var(--vs-border-radius)
            }

            .base-form-multi-select.vs--single .vs__selected {
                background: none
            }

            .base-form-multi-select.vs--single .vs__dropdown-toggle {
                height: 40px
            }
        </style>
        <style type="text/css">
            .menu-item-upsert-modal__row {
                display: flex;
                grid-gap: 18px;
                gap: 18px
            }

            .menu-item-upsert-modal__row--add-variant {
                display: flex;
                width: 100%
            }

            .menu-item-upsert-modal__row--add-variant .base-button {
                width: 100%
            }

            .menu-item-upsert-modal__left,
            .menu-item-upsert-modal__right,
            .menu-item-upsert-modal__wide {
                display: flex;
                flex-direction: column;
                grid-gap: 12px 18px;
                gap: 12px 18px
            }

            .menu-item-upsert-modal__left {
                flex-grow: 1
            }

            .menu-item-upsert-modal__right {
                width: 186px
            }

            .menu-item-upsert-modal__right--price {
                display: flex;
                flex-direction: row;
                align-items: flex-start;
                grid-gap: 8px;
                gap: 8px
            }

            .menu-item-upsert-modal__right--price .base-button {
                margin-top: 26px
            }

            .menu-item-upsert-modal__wide {
                flex: 1
            }

            .menu-item-upsert-modal__new-addon-button {
                font-size: 12px;
                color: var(--color-primary);
                border: 0;
                padding: 0;
                background: transparent
            }

            .menu-item-upsert-modal__loader {
                width: 100%;
                height: 100%;
                padding: 32px 0;
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column
            }

            .menu-item-upsert-modal .menu-item-upsert-modal__textarea-wrapper textarea {
                height: 156px
            }

            .menu-item-upsert-modal .menu-item-upsert-modal__textarea-wrapper--small span {
                line-height: 1.4
            }

            .menu-item-upsert-modal .menu-item-upsert-modal__textarea-wrapper--small textarea {
                height: 100px
            }

            .menu-item-upsert-modal .image-picker {
                height: auto;
                aspect-ratio: 1.61/1
            }
        </style>
        <style type="text/css">
            .category-edit-modal .image-picker {
                height: auto;
                aspect-ratio: 3/1
            }
        </style>
        <style type="text/css">
            .admin-item-add-button {
                width: 100%;
                border-radius: 18px;
                background: var(--color-primary);
                color: var(--color-white);
                padding: 2px 0
            }
        </style>
        <style type="text/css">
            .item-admin-actions {
                display: flex;
                align-items: center;
                justify-content: flex-end
            }

            .item-admin-actions__item {
                padding: 6px;
                color: var(--color-white);
                text-shadow: 0 2px 3px rgba(0, 0, 0, .46)
            }

            .item-admin-actions--black .item-admin-actions__item {
                color: var(--color-text)
            }

            html[dir=rtl] .item-admin-actions__item {
                transform: rotateY(180deg)
            }
        </style>
        <style type="text/css">
            .category-item-admin-actions {
                position: absolute;
                top: 8px;
                right: 8px;
                background: var(--color-white);
                box-shadow: var(--shadow-regular);
                border-radius: 10px
            }

            html[dir=rtl] .category-item-admin-actions {
                right: auto;
                left: 8px
            }
        </style>
        <style type="text/css">
            .crud-modal-form__loader {
                width: 100%;
                height: 100%;
                padding: 32px 0;
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column
            }
        </style>
        <style type="text/css">
            .menu-admin-actions {
                display: flex;
                align-items: center;
                position: absolute;
                right: 50%;
                top: 37px;
                background: var(--color-primary-1);
                color: var(--color-white);
                padding: 3px 6px;
                border-radius: 8px;
                transform: translateX(50%)
            }
        </style>
        <style type="text/css">
            .open-menu-item-button {
                display: flex;
                align-items: center;
                justify-content: center;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
                font-size: 26px;
                font-weight: 500;
                background: var(--color-primary);
                border: none;
                z-index: 1;
                width: 38px;
                height: 38px;
                padding: 0;
                border-radius: 100%;
                cursor: pointer;
                box-shadow: var(--shadow-0);
                transition: opacity .25s, visibility .25s, color .25s
            }

            .open-menu-item-button line,
            .open-menu-item-button svg {
                fill: var(--color-white);
                stroke: var(--color-white)
            }
        </style>
        <style type="text/css">
            .order-item {
                display: flex;
                flex-direction: column
            }

            .order-item-title {
                font-size: 14px;
                font-weight: 500;
                margin: 0
            }

            .order-item-addons {
                font-size: 12px;
                margin: 0;
                color: var(--color-gray-400)
            }

            .order-item-footer {
                display: flex;
                justify-content: space-between;
                align-items: center
            }
        </style>
        <style type="text/css">
            .pswp img {
                max-width: none;
                -o-object-fit: contain;
                object-fit: contain
            }

            html[dir=rtl] .pswp__caption__center {
                text-align: right
            }

            .menu-item {
                position: relative;
                margin: 0;
                display: flex;
                flex-direction: column;
                align-items: center
            }

            .menu-item-na {
                margin-bottom: 8px;
                color: #676767
            }

            .menu-item-content {
                width: 100%;
                display: flex;
                flex-direction: column
            }

            .menu-item-header {
                display: inline-flex;
                align-items: baseline;
                justify-content: flex-start;
                width: 100%;
                grid-gap: 16px;
                gap: 16px;
                margin-bottom: 6px
            }

            .menu-item-footer {
                display: flex;
                width: 100%;
                justify-content: space-between;
                align-items: center;
                margin-top: auto
            }

            .menu-item-action {
                position: absolute;
                top: 0;
                right: -16px;
                z-index: 1;
                display: flex;
                align-items: center
            }

            html[dir=rtl] .menu-item-action {
                left: -10px;
                right: auto
            }

            .menu-item-action .menu-item-admin-actions {
                margin-right: 4px;
                top: -22px;
                position: relative;
                background: var(--color-white);
                box-shadow: var(--shadow-regular);
                border-radius: 10px
            }

            .menu-item._with-choice .menu-item-orders {
                display: flex;
                flex-direction: column;
                grid-gap: 24px;
                gap: 24px;
                background: var(--color-gray-100);
                padding: 16px;
                margin: 16px -16px 0
            }

            .menu-item._with-choice .menu-item-orders .order-action--value .order-action-button {
                background: var(--color-gray-100)
            }

            .menu-item._with-choice:before {
                content: "";
                position: absolute;
                top: 0;
                left: -16px;
                width: 4px;
                height: 100%;
                border-radius: var(--radius-sm);
                background: var(--color-primary)
            }

            .menu-item._without-image {
                border-top: 1px solid var(--color-gray-hover);
                padding-top: 16px
            }

            .menu-item._full .menu-item-title {
                display: block;
                overflow: visible
            }

            .menu-item._not-available .menu-item-description,
            .menu-item._not-available .menu-item-footer,
            .menu-item._not-available .menu-item-image,
            .menu-item._not-visible .menu-item-content,
            .menu-item._not-visible .menu-item-image {
                opacity: .4
            }
        </style>
        <style type="text/css">
            .back-button {
                position: relative;
                border: none;
                background: var(--color-white);
                border-radius: 100%;
                padding: 10px;
                display: flex;
                align-items: center;
                justify-content: center;
                box-shadow: var(--shadow-2);
                cursor: pointer
            }

            .back-button svg {
                width: 20px;
                height: 20px
            }

            .back-button:after {
                background: hsla(0, 0%, 100%, .2)
            }
        </style>
        <style type="text/css">
            .menu-item-list {
                margin-bottom: 32px
            }

            ._admin .menu-item-list {
                padding-top: 16px
            }

            .menu-item-list__title {
                margin-top: 0;
                display: flex;
                align-items: center;
                grid-gap: 4px;
                gap: 4px
            }

            .menu-item-list__edit-category {
                color: var(--color-text);
                margin-top: -3px
            }

            .menu-item-list__item:not(:last-child) {
                margin-bottom: 56px
            }
        </style>
        <style type="text/css">
            .place-nav {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 32px;
                z-index: 100;
                transform: translateZ(0)
            }

            .place-nav__inner {
                position: relative;
                padding: 0
            }

            .place-nav .back-button {
                position: absolute;
                left: 12px;
                top: 12px
            }

            html[dir=rtl] .place-nav .back-button {
                left: auto;
                right: 12px;
                transform: rotateY(180deg)
            }
        </style>
        <link data-n-head="ssr" data-hid="i18n-alt-en" rel="alternate"
            href="https://oddmenu.com/p/hala-chocolate-cafe/cltu7q2tp383120xlp8wlhwp6dv" hreflang="en">
        <link data-n-head="ssr" data-hid="i18n-alt-ar" rel="alternate"
            href="https://oddmenu.com/ar/p/hala-chocolate-cafe/cltu7q2tp383120xlp8wlhwp6dv" hreflang="ar">
        <link data-n-head="ssr" data-hid="i18n-xd" rel="alternate"
            href="https://oddmenu.com/p/hala-chocolate-cafe/cltu7q2tp383120xlp8wlhwp6dv" hreflang="x-default">
        <link data-n-head="ssr" data-hid="i18n-can" rel="canonical"
            href="https://oddmenu.com/p/hala-chocolate-cafe/cltu7q2tp383120xlp8wlhwp6dv">

        <style>
            .place .wrapper {
                width: 100%;
                max-width: 100%;
            }

            .place-content {
                background: #fff0;
                margin-top: 0px;
            }

            .menu-item-list .div {
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: space-between;
                row-gap: 35px;
                padding-bottom: 30px;
            }

            .menu-item-list .div .main-item-box {
                width: 48%;
                backdrop-filter: blur(3px);
                border-radius: 49px;
                padding: 25px 25px;
                background: #c91b2c28;
                box-shadow: 0px 0px 20px 0px #3a3a3a73;
            }

            .right-fade:after {
                display: none !important;
            }

            @media screen and (max-width: 767px) {
                .menu-item-list .div .main-item-box {
                    width: 100%;
                }

                h1.place-title {
                    font-size: 22px;
                    text-align: center;
                }

                .place-info__address {
                    display: flex;
                    align-items: center;
                    flex-wrap: wrap;
                    justify-content: center;
                }

                .menu-list .base-scrollbar {
                    position: relative;
                    display: flex;
                    align-items: center;
                    overflow-x: auto;
                    padding: 0;
                    grid-gap: 0 8px;
                    gap: 0 8px;
                    justify-content: center;
                    margin-bottom: 10px;
                    font-size: 14px;
                }

                h2.menu-item-list__title.h2 {
                    margin: 0;
                    font-size: 16px;
                    margin-bottom: 5px;
                }

                .order-action--regular .order-action-button {
                    font-size: 20px;
                    transform: none !important;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                }

                .order-action.order-action--regular {
                    margin-top: -10px;
                }
            }
            .main-site-logo {
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #ff000000;
}

div#__nuxt {
    background-color: #ff000000 !important;
}

div#__layout {
    background-color: #ff000000 !important;
}
.place-body {
    background-color: #ff000000 !important;
}
body {
    background-size: cover !important;
    background-repeat: no-repeat !important;
}
.modal-content.text-center.p-3.customModal .main-table-modal-box {
    box-shadow: 5px 5px 10px 0px #00000033;
}

.modal-content.text-center.p-3.customModal .main-table-modal-box table.table.table-bordered th,.modal-content.text-center.p-3.customModal .main-table-modal-box table.table.table-bordered td {
    background-color: #ff000033;
    color: white;
    padding: 10px;
    text-align: center;
}
        </style>

    </head>

    <body data-new-gr-c-s-check-loaded="14.1165.0" data-gr-ext-installed="" cz-shortcut-listen="true" style="background-image: url({{ asset('images/OnlineSite/main-bg.png') }})">
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-THVFN3M" height="0" width="0"
                style="display:none;visibility:hidden"></iframe></noscript>
        <div id="__nuxt"><!---->
            <div id="__layout">
                <main class="place"
                    style="--color-primary: #bf1e2e; --color-primary-1: #bf1e2e; --color-primary-4: rgba(76,214,198,0.15); --color-primary-5: rgba(76,214,198,0.1);">
                    <div itemscope="itemscope" itemtype="https://schema.org/LocalBusiness" class="place-body">
                        <div class="main-site-logo">
                            <img src="{{ asset('images/' . $settings->logo) }}" alt="" width="100px" height="100px">
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="place-content wrapper">
                                        <h1 class="place-title"><span>{{ $setting[0]->app_name }}</span> <!----></h1>
                                        <div class="place-info">
                                            <div class="place-info__address">
                                                <div class="place-info__block"><svg xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 256 256" width="16" height="16"
                                                        fill="currentColor">
                                                        <g>
                                                            <circle cx="128" cy="104" r="32" fill="none"
                                                                stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="16"></circle>
                                                            <path
                                                                d="M208,104c0,72-80,128-80,128S48,176,48,104a80,80,0,0,1,160,0Z"
                                                                fill="none" stroke="currentColor"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="16"></path>
                                                        </g>
                                                    </svg> <span>{{ $setting[0]->CompanyAdress }}</span></div>
                                                <div class="place-info__block"><svg xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 256 256" width="16" height="16"
                                                        fill="currentColor">
                                                        <g>
                                                            <path
                                                                d="M92.47629,124.81528a84.34782,84.34782,0,0,0,39.05334,38.8759,7.92754,7.92754,0,0,0,7.8287-.59231L164.394,146.40453a8,8,0,0,1,7.58966-.69723l46.837,20.073A7.97345,7.97345,0,0,1,223.619,174.077,48.00882,48.00882,0,0,1,176,216,136,136,0,0,1,40,80,48.00882,48.00882,0,0,1,81.923,32.381a7.97345,7.97345,0,0,1,8.29668,4.79823L110.31019,84.0571a8,8,0,0,1-.65931,7.53226L93.01449,117.00909A7.9287,7.9287,0,0,0,92.47629,124.81528Z"
                                                                fill="none" stroke="currentColor"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="16"></path>
                                                        </g>
                                                    </svg> <span itemprop="telephone"><a
                                                            href="tel:00971501040995">{{ $setting[0]->CompanyPhone }}</a></span>
                                                </div>
                                                <!---->
                                            </div> <!---->
                                        </div>
                                        <div class="place-layout">
                                            <div class="menu-list right-fade">
                                                <div class="base-scrollbar">
                                                    <div class="menu-list__item">
                                                        <div class="menu _selected">
                                                            <!---->
                                                        </div> <!---->
                                                    </div> <!---->
                                                </div>
                                            </div>
                                            <div class="menu-category-page">
                                                <div class="place-nav">
                                                </div>
                                                <section class="menu-item-list">
                                                    <div class="div">
                                                        @forelse ($products as $product)
                                                            <div class="main-item-box">
                                                                <h2 class="menu-item-list__title h2">
                                                                    <span>{{ $product->name }}</span>
                                                                    <!---->
                                                                </h2>
                                                                @php
                                                                    $imgPath = $product->img_path;
                                                                    if ($product->img_path == '') {
                                                                        $imgPath = "no_image.jpg";
                                                                    }
                                                                @endphp
                                                                <div class="menu-item-list__item">
                                                                    <article class="menu-item">
                                                                        <div class="base-lazy menu-item-image _loaded">
                                                                            <div class="base-lazy__loader"></div> <img
                                                                                alt="{{ $product->name }}"
                                                                                class="v-photoswipe-thumbnail"
                                                                                src="{{ asset('images/products/' . $imgPath) }}">
                                                                        </div>
                                                                        <div class="menu-item-content">
                                                                            <div class="menu-item-body">
                                                                                <div class="menu-item-header">
                                                                                    <h3 class="menu-item-title"><!---->
                                                                                        <span>{{ $product->name }}</span>
                                                                                    </h3> <!---->
                                                                                </div> <!---->
                                                                            </div>
                                                                            <div class="menu-item-footer">
                                                                                <div>
                                                                                    <div
                                                                                        class="menu-item-price menu-item-price--regular">
                                                                                        <span
                                                                                            class="menu-item-price__current"><!---->
                                                                                            <b>{{ $product->online_product_price }}</b>
                                                                                            <span>{{ $setting[0]->Currency->symbol }}</span></span>
                                                                                        <!---->
                                                                                    </div>
                                                                                </div>
                                                                                <div
                                                                                    class="order-action order-action--regular">
                                                                                    <button
                                                                                        class="order-action-button _remove ripple focus"
                                                                                        id="remove_{{ $product->id }}"
                                                                                        onclick="updateQuantity({{ $product->id }})">
                                                                                        –
                                                                                    </button><span
                                                                                        class="order-action-count"
                                                                                        id="count_{{ $product->id }}">0</span>
                                                                                    <button
                                                                                        class="order-action-button _add ripple focus"
                                                                                        id="add_{{ $product->id }}"
                                                                                        onclick="addToCart({{ $product->id }}, {{ $product->online_product_price }}, '{{ $product->name }}', '{{ asset('images/products/' . $product->img_path) }}','{{ $product->selection_required }}')">
                                                                                        +
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="menu-item-orders"></div>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                            <div class="menu-item-action"><!----></div>
                                                            </article> <!---->
                                                        @empty
                                                            <h2 class="menu-item-list__title h2"><span>No Products
                                                                    Found</span> <!---->
                                                            </h2>
                                                        @endforelse
                                                    </div>
                                                </section>
                                            </div>
                                            <a class="place-order focus" id="showCartsLink"
                                                onclick="checkCart()" data-name="Disabled" href="{{ url('guest/cart') }}">Show carts</a>
                                        </div>
                                        {{-- <div class="place-content__footer"><a href="/"
                                            href="{{ url('guest/cart') }}"
                                                class="focus nuxt-link-active">oddmenu.com</a></div> --}}
                                    </div> <!----> <!----> <!---->
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>

         <!-- Flavors Modal -->
            <div class="modal fade" style="overflow-y: hidden!important" id="flavorModal" tabindex="-1"
                aria-labelledby="flavorModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-sm">
                    <div class="modal-content text-center p-3 customModal">
                        <div class="modal-body text-center">
                            <h4 class="text-center my-3 text-white">Choose Flavor</h4>
                                <div class="main-table-modal-box">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">Select</th>
                                                <th scope="col">Flavor</th>
                                            </tr>
                                        </thead>
                                        <tbody id="flavorTable">
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-success" id="flavorBtn" data-bs-dismiss="modal">Ok</button>
                        </div>
                    </div>
                </div>
            </div>

    </body>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{ asset('assets/js/vendor/toastr.min.js') }}"></script>
<script src="{{ asset('assets/js/toastr.script.js') }}"></script>
{{-- <script>
   $(document).ready(function() {
        checkCart();
    });

    function checkCart() {
        $.ajax({
            url: '/checkCart',
            type: "POST",
            token: "{{ csrf_token() }}",
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            data: {
                warehouse_id: {{ $setting[0]->warehouse_id }}
            },
            success: function(response) {
            if (Object.keys(response.data).length > 0) {
                    $("#showCartsLink").attr('href', '{{ url('guest/cart') }}');
                } else {
                    $("#showCartsLink").removeAttr('href');
                    // toastr.error('Cart is empty');
                }
            },

            error: function(data) {
                console.log("Error:", data);
            }
        });
    }
    function addToCart(id, price, name, img_path) {
        $.ajax({
            url: '/guest/addToCart',
            type: "POST",
            token: "{{ csrf_token() }}",
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            data: {
                id,
                price,
                name,
                img_path,
                warehouse_id: {{ $setting[0]->warehouse_id }}
            },
            success: function(response) {
                checkCart();
                if (response.message) {
                    toastr.error('Out of stock');
                } else {
                    $("#count_" + id).css('visibility', 'visible');
                    $("#count_" + id).css('opacity', '1');
                    $("#add_" + id).css('opacity', '1');
                    $("#add_" + id).css('visibility', 'visible');
                    $("#remove_" + id).css('opacity', '1');
                    $("#remove_" + id).css('visibility', 'visible');
                    for (var productId in response.guest_cart) {
                        if (response.guest_cart.hasOwnProperty(productId)) {
                            var quantity = response.guest_cart[productId].quantity;
                            $("#count_" + productId).text(quantity);
                        }
                    }
                }
            },
            error: function(data) {
                console.log("Error:", data);
            }
        });
    }





    function updateQuantity(id) {
        $.ajax({
            url: '/guest/updateQuantity',
            type: "POST",
            token: "{{ csrf_token() }}",
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            data: {
                id: id,
                warehouse_id: {{ $setting[0]->warehouse_id }}
            },
            success: function(responseData) {
                checkCart();
                if (responseData.message === 'Out of stock') {
                    toastr.error('Out of stock');
                }
                for (var productId in responseData.guest_cart) {
                    if (responseData.guest_cart.hasOwnProperty(productId)) {
                        var quantity = responseData.guest_cart[productId].quantity;
                        $("#count_" + productId).text(quantity);
                    }
                }
                if (Object.keys(responseData.guest_cart).length === 0) {
                    $("#count_" + id).text(0);
                }
            },
            error: function(data) {
                console.log(data);
            }
        });
    }
</script> --}}
<script>
    $(document).ready(function() {
         checkCart();
         $('#showCartsLink').click(function(event) {
            event.preventDefault();
            var dataName = $(this).data('name');
            if(dataName === 'Disabled') {
                toastr.error('Cart is empty');
            }else{
                window.location.href = "{{ url('guest/cart') }}";
            }
        });
     });

     function checkCart() {
         $.ajax({
             url: '/checkCart',
             type: "POST",
             token: "{{ csrf_token() }}",
             dataType: "json",
             headers: {
                 "X-CSRF-TOKEN": "{{ csrf_token() }}"
             },
             data: {
                 warehouse_id: {{ $setting[0]->warehouse_id }}
             },
             success: function(response) {
                 if (Object.keys(response.data).length > 0) {
                     $("#showCartsLink").attr('href', '{{ url('guest/cart') }}');
                     $("#showCartsLink").removeAttr('disabled');
                     $("#checkoutBtn").removeAttr('disabled');
                     $('#showCartsLink').data('name', 'Enabled').attr('data-name', 'Enabled');
                 } else {
                     $("#showCartsLink").removeAttr('href');
                     $("#showCartsLink").attr('disabled', 'disabled');
                     $("#checkoutBtn").attr('disabled', 'disabled');
                     $('#showCartsLink').data('name', 'Disabled').attr('data-name', 'Disabled');  // Update data-name attribute
                 }
             },
             error: function(data) {
                 console.log("Error:", data);
             }
         });
     }

     newArr = {};
     let updatedName = '';

     function sendAddToCartRequest (id, price, name, img_path) {
        $.ajax({
             url: '/guest/addToCart',
             type: "POST",
             token: "{{ csrf_token() }}",
             dataType: "json",
             headers: {
                 "X-CSRF-TOKEN": "{{ csrf_token() }}"
             },
             data: {
                 id,
                 price,
                 name,
                 img_path,
                 warehouse_id: {{ $setting[0]->warehouse_id }}
             },
             success: function(response) {
                 checkCart();
                if (response.message) {
                    toastr.error('Out of stock');
                } else {
                    $("#count_" + id).css('visibility', 'visible');
                    $("#count_" + id).css('opacity', '1');
                    $("#add_" + id).css('opacity', '1');
                    $("#add_" + id).css('visibility', 'visible');
                    $("#remove_" + id).css('opacity', '1');
                    $("#remove_" + id).css('visibility', 'visible');
                    for (var productId in response.guest_cart) {
                        if (response.guest_cart.hasOwnProperty(productId)) {
                            var quantity = response.guest_cart[productId].quantity;
                            $("#count_" + productId).text(quantity);
                        }
                    }
                }
                console.log(newArr);
             },
             error: function(data) {
                 console.log("Error:", data);
             }
         });
     }

     function addToCart(id, price, name, img_path, selection_required) {
        if(selection_required == 0){
            sendAddToCartRequest(id, price, name, img_path);
        }else{
            if(!newArr.hasOwnProperty(id)) {
                $.ajax({
                    type: "GET",
                    url: "/getFlavorsforUser",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        $("#flavorTable").empty();

                        data.forEach(function(flavor) {
                            $("#flavorTable").append(`
                                <tr>
                                    <td><input type="radio" class="form-check-input" id="flavor_${flavor.id}" name="flavor" data-name="${flavor.name}" value="${flavor.id}"></td>
                                    <td>${flavor.name}</td>
                                </tr>
                            `);
                        });

                        $("#flavorModal").modal("show");

                        // Attach change event listener to the radio buttons
                        $('input[name="flavor"]').change(function() {
                            selectedFlavorName = $('input[name="flavor"]:checked').data('name');
                            $("#flavorBtn").prop("disabled", false);
                        });

                         // Remove any previous click event handlers to avoid multiple bindings
                        $("#flavorBtn").off("click");
                        $("#flavorBtn").on("click", function() {
                            updatedName = name + " - " + "(" + selectedFlavorName + ")";
                            //Add to cart Run
                            sendAddToCartRequest(id, price, updatedName, img_path);
                            //Add to cart Run
                            $("#flavorModal").modal("hide");
                            if(!newArr[id]){
                                newArr[id] = {'id': id, 'price': price, 'name': name, 'img_path': img_path, 'flavor': 1};
                            }
                        });
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            }else{
                sendAddToCartRequest(id, price, updatedName, img_path);
            }
        }
     }

     function updateQuantity(id) {
         $.ajax({
             url: '/guest/updateQuantity',
             type: "POST",
             token: "{{ csrf_token() }}",
             dataType: "json",
             headers: {
                 "X-CSRF-TOKEN": "{{ csrf_token() }}"
             },
             data: {
                 id: id,
                 warehouse_id: {{ $setting[0]->warehouse_id }}
             },
             success: function(responseData) {
                 checkCart();
                 if (responseData.message === 'Out of stock') {
                     toastr.error('Out of stock');
                 }
                 for (var productId in responseData.guest_cart) {
                     if (responseData.guest_cart.hasOwnProperty(productId)) {
                         var quantity = responseData.guest_cart[productId].quantity;
                         $("#count_" + productId).text(quantity);
                     }
                 }
                 if (Object.keys(responseData.guest_cart).length === 0) {
                     $("#count_" + id).text(0);
                 }
             },
             error: function(data) {
                 console.log(data);
             }
         });
     }
 </script>
