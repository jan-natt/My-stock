<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trading Plans</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .pricing-header {
            text-align: center;
            padding: 60px 20px 20px;
            background: linear-gradient(90deg, #1a73e8, #4285f4);
            color: white;
        }
        .pricing-header h1 {
            font-size: 3em;
            margin-bottom: 10px;
        }
        .pricing-header p {
            font-size: 1.2em;
        }
        .pricing-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin: 40px auto;
            gap: 20px;
            max-width: 1200px;
        }
        .plan-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            width: 280px;
            padding: 30px 20px;
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .plan-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.2);
        }
        .plan-card h2 {
            margin-top: 0;
            color: #1a73e8;
            font-size: 1.8em;
        }
        .plan-price {
            font-size: 2.5em;
            margin: 20px 0;
            color: #333;
        }
        .plan-features {
            list-style: none;
            padding: 0;
            margin: 20px 0;
            text-align: left;
        }
        .plan-features li {
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }
        .plan-features li:last-child {
            border-bottom: none;
        }
        .btn-select {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 25px;
            background: #1a73e8;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 1em;
            transition: background 0.3s;
        }
        .btn-select:hover {
            background: #155bb5;
        }

        @media (max-width: 900px) {
            .pricing-container {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</head>
<body>

    <section class="pricing-header">
        <h1>Trading Plans</h1>
        <p>Choose a plan that suits your trading style and budget.</p>
    </section>

    <section class="pricing-container">
        <div class="plan-card">
            <h2>Basic</h2>
            <div class="plan-price">$9.99 / mo</div>
            <ul class="plan-features">
                <li>Access to 50 stocks</li>
                <li>Real-time quotes</li>
                <li>Basic charting tools</li>
                <li>Email support</li>
            </ul>
            <a href="#" class="btn-select">Select Plan</a>
        </div>

        <div class="plan-card">
            <h2>Pro</h2>
            <div class="plan-price">$29.99 / mo</div>
            <ul class="plan-features">
                <li>Access to 500+ stocks</li>
                <li>Advanced charting & indicators</li>
                <li>Priority support</li>
                <li>Portfolio tracking</li>
            </ul>
            <a href="#" class="btn-select">Select Plan</a>
        </div>

        <div class="plan-card">
            <h2>Premium</h2>
            <div class="plan-price">$59.99 / mo</div>
            <ul class="plan-features">
                <li>Unlimited stocks & crypto</li>
                <li>Advanced trading tools</li>
                <li>Dedicated account manager</li>
                <li>API access & analytics</li>
            </ul>
            <a href="#" class="btn-select">Select Plan</a>
        </div>
    </section>

</body>
</html>
