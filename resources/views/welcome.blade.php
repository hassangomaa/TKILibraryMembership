@extends("layouts.app")

@section("content")
    <!-- ================================ main content ============================== -->
    <div class="container">
        <div class="main-content">
            <div class="main-content-header">
                <h1>The KPI Dictionary Volume I: Functional Areas</h1>
            </div>

            <div class="main-comtent-second-header">
                3,200+ Key Performance Indicator Definitions
                <br>
                for an in-depth view on performance measurement
            </div>

            <div class="main-content-paragraph">
                <span style="font-family: 'Finlandica', sans-serif; font-size: 20px; font-weight: 700; color: #000000;">
                    The KPI Dictionary - Volume 1
                </span>
                is a reference collection of Key Performance Indicators, used in practice today, which covers the major functional areas of an organization, regardless of its industry specifics. The collection contains the most relevant means for measuring performance throughout the most common departments in either public, private, or non-profit organizations, such as: Finance, Sales, Human Resources, Marketing, and IT.
            </div>

            <div class="main-content-download-containrt">
                <div class="main-content-download-containrt-left">
                    <div class="main-content-download-containrt-left-header">
                        <img src="./downloads/Icon1_03.png" alt="">
                        <p>KEY BENEFITS OF THE FUNCTIONAL AREAS KPI DICTIONARY</p>
                    </div>
                    <div class="main-content-download-containrt-left-description">
                        <div>
                            <div class="main-content-download-containrt-left-description-item">
                                <p>
                                    <span>SELECT</span>
                                    - the critical KPIs to drive operational success
                                </p>
                            </div>
                            <div class="main-content-download-containrt-left-description-item">
                                <p>
                                    <span>SELECT</span>
                                    - the critical KPIs to drive operational success
                                </p>
                            </div>
                            <div class="main-content-download-containrt-left-description-item">
                                <p>
                                    <span>SELECT</span>
                                    - the critical KPIs to drive operational success
                                </p>
                            </div>
                            <div class="main-content-download-containrt-left-description-item">
                                <p>
                                    <span>SELECT</span>
                                    - the critical KPIs to drive operational success
                                </p>
                            </div>
                        </div>
                        <div>
                            <img src="./downloads/Icon1_07.png" alt="">
                        </div>
                    </div>
                </div>

                <div class="main-content-download-containrt-right">
                    <div class="main-content-download-containrt-right-form">
                        <h2>Download the free sample</h2>
                        <p>To proceed with your order, please take a moment to fill in the fields below:</p>
                        <form action="{{ route('form.submit') }}" method="POST" id="download-form">
                            @csrf
                            <input type="text" name="first_name" placeholder="First Name" required>
                            <input type="text" name="last_name" placeholder="Last Name" required>
                            <input type="text" name="company" placeholder="Company" required>
                            <input type="text" name="country" id="country" placeholder="Country" required>

                            <div>
                                <input type="text" name="prefix" id="phone-prefix" placeholder="Prefix" required>
                                <input type="text" name="phone_number" placeholder="Phone Number" required>
                            </div>

                            <input type="text" name="email" placeholder="Email Address" required>
                            <div class="main-content-download-containrt-right-form-footer">
                                <p>We value your privacy and will never disclose your data to third parties without your consent.</p>
                                <button type="submit">Download</button>
                            </div>
                        </form>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- =============================== TKI FACTS AND FIGURES ===================== -->
    <div class="main-figure-container">
        <h2>TKI FACTS AND FIGURES</h2>
        <div class="main-figure-container-content">
            <div>
                <img src="./downloads/Icon1_11.png" alt="">
                <p>
                    <span>75,000+</span>
                    <span>COMMUNITY<br>MEMBERS</span>
                </p>
            </div>
            <div>
                <img src="./downloads/Icon1_11.png" alt="">
                <p>
                    <span>75,000+</span>
                    <span>COMMUNITY<br>MEMBERS</span>
                </p>
            </div>
            <div>
                <img src="./downloads/Icon1_11.png" alt="">
                <p>
                    <span>75,000+</span>
                    <span>COMMUNITY<br>MEMBERS</span>
                </p>
            </div>
            <div>
                <img src="./downloads/Icon1_11.png" alt="">
                <p>
                    <span>75,000+</span>
                    <span>COMMUNITY<br>MEMBERS</span>
                </p>
            </div>
            <div>
                <img src="./downloads/Icon1_11.png" alt="">
                <p>
                    <span>75,000+</span>
                    <span>COMMUNITY<br>MEMBERS</span>
                </p>
            </div>
        </div>
    </div>

    <!-- =============================== contact us ===================== -->
    <div class="contactus-container">
        <div class="contactus">
            <div>
                <div>
                    <img src="./downloads/Icon1_15.png" alt="">
                </div>
                <div>
                    <h2>CHAT WITH US</h2>
                    <p>Have questions? A customer service representative is online to help you via Live Chat. Join in the conversation.</p>
                </div>
            </div>
            <div>
                <div>
                    <img src="./downloads/Icon1_15.png" alt="">
                </div>
                <div>
                    <h2>CHAT WITH US</h2>
                    <p>Have questions? A customer service representative is online to help you via Live Chat. Join in the conversation.</p>
                </div>
            </div>
            <div>
                <div>
                    <img src="./downloads/Icon1_15.png" alt="">
                </div>
                <div>
                    <h2>CHAT WITH US</h2>
                    <p>Have questions? A customer service representative is online to help you via Live Chat. Join in the conversation.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#country').change(function() {
                var countryCode = $(this).val();
                $.ajax({
                    url: "{{ route('form.get-phone-code') }}",
                    type: "GET",
                    data: { country_code: countryCode },
                    success: function(response) {
                        $('input[name="prefix"]').attr('placeholder', response.phone_prefix);
                        $('input[name="phone_number"]').attr('placeholder', response.phone_number);
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>

@endsection
