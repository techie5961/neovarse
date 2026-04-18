<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reset Your Neovarse Password</title>
</head>
<body style="margin: 0; padding: 0; background-color: #000000;" bgcolor="#000000">
  <center style="width: 100%; table-layout: fixed;">
    <table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#000000" style="background-color: #000000;">
      <tr>
        <td align="center" style="padding: 40px 0">
          <!-- Main Container -->
          <table width="100%" max-width="520" cellpadding="0" cellspacing="0" border="0" bgcolor="#0a0a0a" style="max-width: 520px; width: 100%; background-color: #0a0a0a; border-radius: 24px; border: 1px solid #2a2a2a;">
            <tr>
              <td style="padding: 40px 32px 32px 32px; text-align: center;" bgcolor="#0a0a0a">
                <!-- Logo / Site Name -->
                <h1 style="margin: 0 0 8px 0; font-size: 32px; font-weight: 700; color: #ffffff;">NEOVARSE</h1>
                <p style="color: #a1a1aa; font-size: 14px; margin-top: 4px;">learn • engage • earn</p>
                
                <div style="height: 2px; width: 60px; background: #7e22ce; margin: 24px auto 20px auto;"></div>
                
                <h2 style="color: #ffffff; font-size: 24px; font-weight: 600; margin: 16px 0 12px 0;">Reset your password</h2>
                <p style="color: #d4d4d8; font-size: 16px; line-height: 1.5; margin-bottom: 28px;">We received a request to reset the password for your Neovarse account. Click the button below to create a new one.</p>
                <i>This link expires in 10 minutes</i>
                <!-- Button with fallback -->
                <table cellpadding="0" cellspacing="0" border="0" align="center" style="margin: 8px auto 16px auto;">
                  <tr>
                    <td bgcolor="#7e22ce" style="background-color: #7e22ce; border-radius: 60px; padding: 0;">
                     <!-- CTA Button -->
              <a href="{{ url('users/reset/password?otp='.$otp.'&email='.$email.'') }}" style="display: inline-block; background: #7e22ce; color: rgb(255,255,255); text-decoration: none; font-weight: 600; font-size: 16px; padding: 14px 32px; border-radius: 60px; box-shadow: 0 4px 12px rgba(126, 34, 206, 0.3); transition: all 0.2s ease; margin: 8px 0 16px 0;">Reset password →</a>
                   </td>
                  </tr>
                </table>
                
                <p style="color: #71717a; font-size: 14px; margin-top: 24px; word-break: break-all;">Or copy this link:<br><a href="{{ url('users/reset/password?otp='.$otp.'&email='.$email.'') }}" style="color: #a855f7; text-decoration: none;">{{ url('users/reset/password?otp='.$otp.'&email='.$email.'') }}</a></p>
                
                <div style="height: 1px; background-color: #2a2a2a; margin: 32px 0 20px 0;"></div>
                
                <p style="color: #52525b; font-size: 13px; margin: 0;">If you didn't request this, just ignore this email — your password won't change.</p>
                <p style="color: #3f3f46; font-size: 12px; margin-top: 24px;">&copy; 2026 Neovarse • Earn while you Learn</p>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  </center>
</body>
</html>

            