function nospam(email, domain, tld)
{
  document.write("<a href='mailto:" + email + "@" + domain + "." + tld + "'>" + email + "@" + domain + "." + tld + "</a>");
}