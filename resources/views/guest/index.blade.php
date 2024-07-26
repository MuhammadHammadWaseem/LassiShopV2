@extends('guest.layouts.main')
@section('content')

    <head>
        <title>{{ $settings->app_name }}</title>
        <meta data-n-head="ssr" charset="utf-8">
        <meta data-n-head="ssr" name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=5.0">
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
                max-width: var(--max-content-width);
                max-width: 100%;
                max-width: 100%;
            }

            div#category_list {
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: space-between;
                row-gap: 20px;
            }

            div#category_list .category-list__item {
                width: 49%;
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
                position: relative;
                width: 100% !important;
                max-width: 100% !important;
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
                background: rgba(255, 0, 0, 0);
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
                padding: 10px 14px;
                color: #F3F3F3;
                background: currentColor;
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
                overflow: hidden;
                border-radius: 20px;
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
                letter-spacing: 1px;
                position: absolute;
                top: 35%;
            }

            @media (min-width: 420px) {
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
            .place-content.wrapper.mt-2 button#TrackOrder {
    max-width: max-content;
    float: right;
    display: block;
    margin: auto;
    margin-right: 0;
    margin-top: -40px;
}

#exampleModal .modal-content {
    padding: 50px 400px;
}

#exampleModal .modal-content .row {
    --bs-gutter-x: 0 !important;
}

 #exampleModal .modal-content  tbody#order_table_body hr {
    display: none;
}

 #exampleModal .modal-content  tbody#order_table_body h3 {
    border: 1px solid rgba(0, 0, 0, 0.116);
    border-right: 0;
    border-left: 0;
    padding: 10px 0;
    margin-bottom: 15px;
}

@media only screen and (max-width: 767px) {
    .place-content.wrapper.mt-2 button#TrackOrder {
    margin: auto;
    margin-right: auto;
    margin-top: 10px;
    margin-bottom: 10px;
}


}

@media only screen and (max-width: 1440px) {

    #exampleModal .modal-content {
    padding: 35px 100px;
}


}






            @media only screen and (max-width: 1024px) {
                .category-item__link .h2 {
                    top: 40%;
                    font-size: 20px !important;
                    margin: 0;
                }


            }

            @media only screen and (max-width: 768px){
                .modal-fullscreen .modal-body h1.place-title {
    font-size: 25px;
}


            }

            @media only screen and (max-width: 575px) {
                div#category_list .category-list__item {
                    width: 100%;
                    margin: 0;
                }

                .category-item__link .h2 {
                    font-size: 16px !important;
                }

                .place-content.wrapper.mt-2 {
                    padding: 0;
                    padding-top: 15px;
                }

                h1.place-title {
                    text-align: center;
                    font-size: 22px;
                    margin-bottom: 10px;
                }

                .place-info__address {
                    display: flex;
                    align-items: flex-start;
                    flex-wrap: wrap;
                    justify-content: space-between;
                }

                .place-info__block:not(:last-child) {
                    margin-right: 0px;
                }

                .menu-item-search-form._open {
                    margin-bottom: 0;
                }

                #exampleModal .modal-content {
    padding: 15px 20px;
}
.modal-fullscreen .modal-body h1.place-title {
    font-size: 20px;
    line-height: 1em;
}

#exampleModal .modal-content tbody#order_table_body h3 {
    margin-bottom: 10px;
    font-size: 18px;
}
.col-md-6 p.card-text {
    font-size: 14px;
    text-align: center;
    margin-bottom: 5px;
}
.modal-body {
    flex: none !important;

}

            }
            .main-site-logo {
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #ff000000;
}

.place-body {
    background-color: #ff000000;
}
div#__nuxt {
    background-color: #ff000000;
}

div#__layout {
    background-color: #ff000000;
}
body {
    background-size: cover !important;
    background-repeat: no-repeat !important;
}
        </style>
        <title>Lassi Shop</title>
    </head>

    <body style="background-image: url({{ asset('images/OnlineSite/main-bg.png') }})">
        {{-- <noscript>
            <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-THVFN3M" height="0" width="0"
                style="display:none;visibility:hidden"></iframe>
        </noscript> --}}
        <div data-server-rendered="true" id="__nuxt">
            <!---->
            <div id="__layout">
                <main class="place"
                    style="--color-primary:#bf1e2e;--color-primary-1:#bf1e2e;--color-primary-4:rgba(76,214,198,0.15);--color-primary-5:rgba(76,214,198,0.1);">
                    <div itemscope="itemscope" itemtype="https://schema.org/LocalBusiness" class="place-body">
                        <div class="main-site-logo">
                            <img src="{{ asset('images/' . $settings->logo) }}" alt="" width="100px" height="100px">
                        </div>
                        <div class="place-content wrapper mt-2">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h1 class="place-title"><span>{{ $setting[0]->app_name }}</span> <!----></h1>
                                        {{-- <h1 class="place-title"><span>{{ $OrderNumber ?? '' }}</span></h1> --}}
                                        <div class="row">
                                            <button class="btn btn-danger sm" id="TrackOrder" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal"><a href="#">Track Order</a></button>
                                        </div>
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
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="16"></path>
                                                        </g>
                                                    </svg> <span>{{ $setting[0]->CompanyAdress }}</span></div>
                                                <div class="place-info__block"><svg xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 256 256" width="16" height="16"
                                                        fill="currentColor">
                                                        <g>
                                                            <path
                                                                d="M92.47629,124.81528a84.34782,84.34782,0,0,0,39.05334,38.8759,7.92754,7.92754,0,0,0,7.8287-.59231L164.394,146.40453a8,8,0,0,1,7.58966-.69723l46.837,20.073A7.97345,7.97345,0,0,1,223.619,174.077,48.00882,48.00882,0,0,1,176,216,136,136,0,0,1,40,80,48.00882,48.00882,0,0,1,81.923,32.381a7.97345,7.97345,0,0,1,8.29668,4.79823L110.31019,84.0571a8,8,0,0,1-.65931,7.53226L93.01449,117.00909A7.9287,7.9287,0,0,0,92.47629,124.81528Z"
                                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="16"></path>
                                                        </g>
                                                    </svg> <span itemprop="telephone"><a
                                                            href="tel:00971501040995">{{ $setting[0]->CompanyPhone }}</a></span>
                                                </div>
                                                <!---->
                                            </div> <!---->
                                            <div class="container ">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div search-value="" class="menu-item-search-form _open">
                                                            <form action class="menu-item-search-form-field">
                                                                <div type="search" placeholder="Search"
                                                                    class="base-form-input base-form-input--regular">
                                                                    <!---->
                                                                    <input type="search" value="" type="search"
                                                                        placeholder="Search" class="base-form-input-input"
                                                                        id="search-input">
                                                                    <button aria-label="Search"
                                                                        class="round-button focus _expand-clickable ripple menu-item-search-form-button">
                                                                        <svg width="24" height="24"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                                d="M14 18C18.4183 18 22 14.4183 22 10C22 5.58172 18.4183 2 14 2C9.58172 2 6 5.58172 6 10C6 11.8487 6.62708 13.551 7.68014 14.9056L2.29289 20.2929L3.70711 21.7071L9.09436 16.3199C10.449 17.3729 12.1513 18 14 18ZM8 10C8 13.3137 10.6863 16 14 16C17.3137 16 20 13.3137 20 10C20 6.68629 17.3137 4 14 4C10.6863 4 8 6.68629 8 10Z"
                                                                                fill="var(--color-text)"></path>
                                                                        </svg>
                                                                    </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="category_list">
                                                @foreach ($categories as $category)
                                                    <div class="category-list__item">

                                                        <div class="category-item">
                                                            <img src="{{ asset('storage/' . $category->image) }}"
                                                                alt="">
                                                            <a href="{{ route('getProductByCategory', $category->id) }}"
                                                                class="category-item__link focus">
                                                                <h2 class="h2">{{ $category->name }}</h2>
                                                            </a>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
            </main>
        </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tarck Orders</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="place-title"><span>You Order No#</span></h1>
                                <h1 class="place-title"><span>{{ $OrderNumber ?? '' }}</span></h1>
                                <div search-value="" class="menu-item-search-form _open">
                                    <form action="" class="menu-item-search-form-field">
                                        <div type="search" placeholder="Search"
                                            class="base-form-input base-form-input--regular">
                                            <!---->
                                            <input type="search" value=""
                                                placeholder="Search Orders" class="base-form-input-input"
                                                id="search-orders">
                                            {{-- <button aria-label="Search"
                                                class="round-button focus _expand-clickable ripple menu-item-search-form-button">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M14 18C18.4183 18 22 14.4183 22 10C22 5.58172 18.4183 2 14 2C9.58172 2 6 5.58172 6 10C6 11.8487 6.62708 13.551 7.68014 14.9056L2.29289 20.2929L3.70711 21.7071L9.09436 16.3199C10.449 17.3729 12.1513 18 14 18ZM8 10C8 13.3137 10.6863 16 14 16C17.3137 16 20 13.3137 20 10C20 6.68629 17.3137 4 14 4C10.6863 4 8 6.68629 8 10Z"
                                                        fill="var(--color-text)"></path>
                                                </svg>
                                            </button> --}}
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <table class="table table-hover table-sm" id="order_table">
                                <tbody id="order_table_body">

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal End --}}
    </body>

    </html>
    </style>
    </head>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        trackOrder();

        $('#search-input').on('input', function() {
            var query = $(this).val();
            $.ajax({
                url: "{{ route('search.category') }}",
                method: 'GET',
                data: {
                    query: query
                },
                success: function(response) {
                    $("#category_list").empty();
                    response.forEach(function(category) {
                        $("#category_list").append(`
                        <div class="category-list__item">
                            <div class="category-item">
                                <img src="{{ asset('storage/') }}/${category.image}" alt="">
                                <a href="#" class="category-item__link focus">
                                    <h2 class="h2">${category.name}</h2>
                                </a>
                            </div>
                        </div>
                    `);
                    });
                }
            });
        });

       function trackOrder() {
        $('#search-orders').on('input', function() {
            var query = $(this).val();
            $.ajax({
                url: "{{ route('search.guest.order') }}",
                method: 'GET',
                data: {
                    query: query
                },
                // success: function(response) {
                //     $("#order_table_body").empty();
                //     if (response.success) {
                //         var order = response.data;

                //         // Format the date
                //         var orderDate = new Date(order.created_at);
                //         var formattedDate = orderDate.toLocaleString('en-US', {
                //             timeZone: 'UTC'
                //         });

                //         // Determine the order status text based on the order_status value
                //         var orderStatusText;
                //         switch (order.order_status) {
                //             case 0:
                //                 orderStatusText = 'Confirmed';
                //                 break;
                //             case 1:
                //                 orderStatusText = 'On the way';
                //                 break;
                //             case 2:
                //                 orderStatusText = 'Delivered';
                //                 break;
                //             default:
                //                 orderStatusText = 'Unknown';
                //         }

                //         // Construct the new row
                //         var newRow = '<tr>' +
                //             '<td>' + order.name + '</td>' +
                //             '<td>' + order.address + ', ' + order.city + ', ' + order
                //             .country + '</td>' +
                //             '<td>' + order.delivery_charges + '</td>' +
                //             '<td>' + order.total + '</td>' +
                //             '<td>' + formattedDate + '</td>' +
                //             '<td>' + orderStatusText + '</td>' +
                //             '</tr>';

                //         $('#order_table_body').append(newRow);
                //     }
                // }
                success: function(response) {
                     $("#order_table_body").empty();
                console.log(response);
                var formatedTime = new Date(response.orders.created_at).toLocaleString();
                // var orderStatusText;
                //         switch (response.orders.order_status) {
                //             case 0:
                //                 orderStatusText = 'Confirmed';
                //                 break;
                //             case 1:
                //                 orderStatusText = 'On the way';
                //                 break;
                //             case 2:
                //                 orderStatusText = 'Delivered';
                //                 break;
                //             default:
                //                 orderStatusText = 'Unknown';
                //         }
                $("#order_table_body").empty();
                $("#order_table_body").append(`
                <div class="row">
                    <h3 class="text-center">Client Information</h3>
                    <hr style="height:1px;border-width:0;color:gray;background-color:gray">
                    <div class="col-md-6">
                        <p class="card-text">${response.orders.name}</p>
                        <p class="card-text">${response.orders.email}</p>
                        <p class="card-text">${response.orders.phone}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="card-text">${response.orders.country}</p>
                        <p class="card-text">${response.orders.city}</p>
                        <p class="card-text">${response.orders.address}</p>
                        <p class="card-text">${response.orders.payment_method.title}</p>
                        <p class="card-text">${response.orders.order_status == 0 ? 'Confirmed' : response.orders.order_status == 1 ? 'On the way' : 'Delivered'}</p>
                        <p class="card-text">${formatedTime}</p>
                    </div>
                </div>
                `);

                response.orders.forEach(function(order) {
                    $("#order_table_body").append(`
                    <div class="row">
                        <div class="col-md-6">
                            <p class="card-text">Name: ${order.products.name}</p>
                            <p class="card-text">Price: ${order.products.online_product_price}</p>
                            <p class="card-text">Qty: ${order.quantity}</p>
                        </div>
                    </div>
                    <hr style="height:1px;border-width:0;color:gray;background-color:gray">
                    `);
                });

                $("#order_table_body").append(`
                    <div class="row">
                        <div class="col-md-6">
                            <p class="card-text">Delivery Charges: ${response.orders.delivery_charges}</p>
                            <p class="card-text">Total: ${response.orders.total}</p>
                        </div>
                    </div>
                `);
            },
            });

        });
        }
    });
</script>
