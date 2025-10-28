<x-frontend-layout title="Waiting Approval">
    @push('css')
        <style>
            /* ---- Page layout ---- */

            /* ---- Card ---- */
            .wait-card {
                background: #fff;
                padding: 40px;
                border-radius: 20px;
                text-align: center;
                box-shadow: 0 10px 30px rgba(0,0,0,0.1);
                max-width: 400px;
                width: 90%;
                margin-top: 120px;
            }

            /* ---- Animated Circle ---- */
            .circle {
                width: 120px;
                height: 120px;
                margin: 0 auto 20px;
                border-radius: 50%;
                background: #0d6efd;
                display: flex;
                justify-content: center;
                align-items: center;
                position: relative;
                box-shadow: 0 0 0 0 rgba(13,110,253,0.7);
                animation: pulse 2s infinite;
            }

            @keyframes pulse {
                0% { box-shadow: 0 0 0 0 rgba(13,110,253,0.7); }
                70% { box-shadow: 0 0 0 20px rgba(13,110,253,0); }
                100% { box-shadow: 0 0 0 0 rgba(13,110,253,0); }
            }

            /* ---- Checkmark drawing animation ---- */
            .checkmark {
                width: 60px;
                height: 60px;
                stroke-width: 4;
                stroke: #fff;
                fill: none;
                stroke-linecap: round;
                stroke-linejoin: round;
                stroke-dasharray: 48;
                stroke-dashoffset: 48;
                animation: draw 1.2s ease forwards 0.5s;
            }

            @keyframes draw {
                to { stroke-dashoffset: 0; }
            }

            /* ---- Text ---- */
            .wait-card h2 {
                color: #333;
                font-weight: 600;
                margin-bottom: 10px;
            }

            .wait-card p {
                color: #666;
                font-size: 15px;
                margin-bottom: 25px;
            }

            /* ---- Optional Button ---- */
            .btn-home {
                display: inline-block;
                background: #0d6efd;
                color: #fff;
                padding: 12px 25px;
                border-radius: 30px;
                text-decoration: none;
                transition: background 0.3s;
            }
            .btn-home:hover { background: #0b5ed7; }
        </style>
    @endpush
    <div class="d-flex justify-content-center item-align-center ali py-5">
        <div class="wait-card ">
            <div class="circle">
                <svg class="checkmark" viewBox="0 0 52 52">
                    <path d="M14 27 L22 35 L38 17" />
                </svg>
            </div>
            <h2>Payment Submitted!</h2>
            <p>Your payment is received and is <strong>waiting for admin approval</strong>.</p>
            <p>You will be notified once it’s approved.</p>
            <a href="{{ url('/') }}" class="btn-home">Go to Homepage</a>
        </div>
    </div>

    @push('js')
        <script>
            // Optional: Redirect after 10 seconds
            // setTimeout(()=> window.location.href='{{ url("/") }}',10000);
        </script>
    @endpush
</x-frontend-layout>
