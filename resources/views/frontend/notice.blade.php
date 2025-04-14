<style>
        .marquee-container {
            overflow: hidden;
            position: relative;
            background-color: #FEF3C7; /* yellow-100 */
            border: 1px solid #FACC15; /* yellow-400 */
            color: #92400E; /* yellow-800 */
            height: 45px;
            display: flex;
            width: 90%;
            margin: 0 auto;
            align-items: center;
        }

        .notice-text {
            flex-shrink: 0;
            background-color: #F37021;
            color: white;
            padding: 0 1rem;
            height: 100%;
            display: flex;
            align-items: center;
            font-weight: bold;
            z-index: 10;
        }

        .marquee-wrapper {
            position: relative;
            overflow: hidden;
            flex-grow: 1;
        }

        .marquee-text {
            display: inline-block;
            white-space: nowrap;
            will-change: transform;
            animation: marquee 25s linear infinite;
            font-weight: 600;
            padding-left: 1rem;
        }

        @keyframes marquee {
            0% {
                transform: translateX(100%);
            }
            100% {
                transform: translateX(-100%);
            }
        }
    </style>

    <div class="marquee-container text-sm w-[90%] mx-auto">
        <div class="notice-text">
            📢 Notice
        </div>
        <div class="marquee-wrapper">
            <span class="marquee-text">
                শাখা অনুমোদন ২০২৫ : দেশ জুড়ে আঞ্চলিক শাখা অনুমোদন চলছে, আপনার কম্পিউটার ট্রেনিং ব্যবসাকে পরিকল্পিতভাবে প্রসারিত করতে আপনিও যুক্ত হতে পারেন আমাদের সাথে। আমরা আছি দেশ জুড়ে, দক্ষ জনবল সৃষ্টির লক্ষ্যে।
            </span>
        </div>
    </div>