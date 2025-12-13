# 🚀 Hosting Options for D'house Waffle

## 📊 Quick Comparison

| Provider | Cost/Month | Location | Docker Support | Difficulty | Recommended For |
|----------|-----------|----------|----------------|------------|-----------------|
| **DigitalOcean** | RM 24-200 | SG | ✅ Native | ⭐⭐ Easy | **Best for Docker** |
| **Vultr** | RM 25-200 | SG/MY | ✅ Native | ⭐⭐ Easy | **Good value** |
| **AWS Lightsail** | RM 18-150 | SG | ✅ Native | ⭐⭐⭐ Medium | **Scalable** |
| **Linode** | RM 25-200 | SG | ✅ Native | ⭐⭐ Easy | **Reliable** |
| **Exabytes (MY)** | RM 20-150 | MY | ⚠️ Manual | ⭐⭐⭐ Medium | **Local support** |
| **Laravel Forge** | RM 75+VPS | Any | ✅ Easy | ⭐ Very Easy | **Zero hassle** |

---

## 🏆 RECOMMENDED OPTIONS

### **Option 1: DigitalOcean + Docker** ⭐ **BEST**

**Why Best for Docker:**
- Native Docker support
- One-click Docker droplet
- Great documentation
- Fast SSD storage
- Singapore datacenter (low latency)

#### **Pricing:**
```
$5/month (RM 24):
- 1 GB RAM
- 1 vCPU
- 25 GB SSD
- 1 TB Transfer
→ Good for testing/small traffic

$12/month (RM 57):
- 2 GB RAM
- 1 vCPU
- 50 GB SSD
- 2 TB Transfer
→ **RECOMMENDED for production start**

$24/month (RM 115):
- 4 GB RAM
- 2 vCPUs
- 80 GB SSD
- 4 TB Transfer
→ For growing business
```

#### **Setup Steps:**
```bash
# 1. Create Droplet
- Choose Docker on Ubuntu 22.04
- Select Singapore region
- Choose $12 plan
- Add SSH key
- Create

# 2. Connect via SSH
ssh root@your-server-ip

# 3. Deploy
git clone https://github.com/your-repo/dhouse-waffle.git
cd dhouse-waffle
docker-compose up -d

# 4. Configure Nginx + SSL
# (see deployment guide)
```

#### **Pros:**
✅ Docker pre-installed
✅ Easy to scale
✅ Great community support
✅ Singapore datacenter (fast for Malaysia)
✅ Free $200 credit for new users (60 days)
✅ Managed databases available
✅ Automatic backups (RM 8/month)

#### **Cons:**
⚠️ Need technical knowledge
⚠️ US-based company
⚠️ Pay in USD

**Link:** https://www.digitalocean.com/

---

### **Option 2: Vultr** ⭐ **GOOD VALUE**

**Similar to DigitalOcean but cheaper:**

#### **Pricing:**
```
$6/month (RM 28):
- 1 GB RAM
- 1 vCPU
- 25 GB SSD
- 1 TB Transfer

$12/month (RM 57):
- 2 GB RAM
- 1 vCPU
- 55 GB SSD
- 2 TB Transfer
→ **RECOMMENDED**

$24/month (RM 115):
- 4 GB RAM
- 2 vCPUs
- 80 GB SSD
- 3 TB Transfer
```

#### **Pros:**
✅ Cheaper than DigitalOcean
✅ Singapore + Kuala Lumpur datacenters
✅ Docker support
✅ Hourly billing
✅ Good performance

#### **Cons:**
⚠️ Smaller community
⚠️ Less documentation

**Link:** https://www.vultr.com/

---

### **Option 3: Laravel Forge + Any VPS** ⭐ **EASIEST**

**Zero-hassle managed deployment:**

#### **How It Works:**
```
1. Buy VPS (DigitalOcean/Vultr/etc): RM 57/month
2. Laravel Forge subscription: RM 75/month
3. Connect Forge to VPS
4. Deploy with 1 click

Total: RM 132/month
```

#### **Features:**
- ✅ One-click deployment
- ✅ Auto SSL (Let's Encrypt)
- ✅ Git push to deploy
- ✅ Database management
- ✅ Queue workers
- ✅ Scheduled tasks (cron)
- ✅ Server monitoring
- ✅ Zero downtime deploy

#### **Setup:**
```bash
# 1. Sign up Laravel Forge
https://forge.laravel.com

# 2. Connect VPS provider
- Add DigitalOcean/Vultr API token

# 3. Create server
- Click "Create Server"
- Choose plan
- Wait 5 minutes

# 4. Deploy site
- Connect GitHub repo
- Click "Deploy"
- Done!
```

#### **Pros:**
✅ Easiest option (zero DevOps)
✅ Auto SSL
✅ Push to deploy
✅ Professional
✅ Perfect for Laravel
✅ Time-saving

#### **Cons:**
⚠️ Extra cost (RM 75/month)
⚠️ Overkill for small projects

**Link:** https://forge.laravel.com/

---

### **Option 4: Exabytes Malaysia** 🇲🇾 **LOCAL**

**Local Malaysian hosting:**

#### **Pricing:**
```
Cloud VPS-1 (RM 20/month):
- 1 GB RAM
- 1 vCPU
- 20 GB SSD

Cloud VPS-2 (RM 50/month):
- 2 GB RAM
- 2 vCPUs
- 40 GB SSD
→ **Minimum recommended**

Cloud VPS-3 (RM 100/month):
- 4 GB RAM
- 4 vCPUs
- 80 GB SSD
```

#### **Pros:**
✅ Malaysian company
✅ Local support (Malay/English)
✅ MYR payment
✅ .my domain included
✅ Phone/chat support

#### **Cons:**
⚠️ Docker not pre-installed
⚠️ Need manual setup
⚠️ Less flexible than DigitalOcean

**Link:** https://www.exabytes.my/

---

### **Option 5: AWS Lightsail** ⭐ **SCALABLE**

**Amazon's simple VPS:**

#### **Pricing:**
```
$3.50/month (RM 17):
- 512 MB RAM (too small)

$5/month (RM 24):
- 1 GB RAM
- 1 vCPU
- 40 GB SSD

$10/month (RM 48):
- 2 GB RAM
- 1 vCPU
- 60 GB SSD
→ **RECOMMENDED**
```

#### **Pros:**
✅ Amazon reliability
✅ Easy to upgrade to full AWS
✅ Singapore datacenter
✅ Managed databases
✅ Load balancer available
✅ CDN integration

#### **Cons:**
⚠️ AWS complexity if scale up
⚠️ Pay in USD

**Link:** https://aws.amazon.com/lightsail/

---

## 🎯 MY RECOMMENDATION

### **For D'house Waffle:**

#### **Option A: Budget (< RM 100/month)**
```
DigitalOcean Droplet ($12/month = RM 57)
+ Domain (.com = RM 50/year)
+ SSL (Free - Let's Encrypt)

Total: RM 57/month + RM 4/month domain
     = RM 61/month

Setup: 2-3 hours (manual)
```

#### **Option B: Easy (No tech hassle)**
```
Laravel Forge (RM 75/month)
+ DigitalOcean VPS (RM 57/month)
+ Domain (RM 50/year)

Total: RM 132/month + RM 4/month domain
     = RM 136/month

Setup: 30 minutes (automated)
```

#### **Option C: Local (Malaysian company)**
```
Exabytes Cloud VPS-2 (RM 50/month)
+ .my domain (included)

Total: RM 50/month

Setup: 2-3 hours (manual Docker install)
```

---

## 🚀 RECOMMENDED: DigitalOcean Setup

### **Why DigitalOcean:**
1. ✅ Docker pre-installed (1-click)
2. ✅ Singapore datacenter (fast for Malaysia)
3. ✅ Great documentation
4. ✅ Easy to scale
5. ✅ Free $200 credit for new users
6. ✅ Best price/performance

### **Step-by-Step Setup:**

#### **1. Sign Up (5 minutes)**
```
1. Go to https://www.digitalocean.com/
2. Sign up with email
3. Verify email
4. Add payment (credit card)
5. Get $200 free credit (60 days)
```

#### **2. Create Droplet (5 minutes)**
```
1. Click "Create" → "Droplets"
2. Choose image: "Docker on Ubuntu 22.04"
3. Choose plan: "Basic" → "$12/month"
4. Choose datacenter: "Singapore - SGP1"
5. Add SSH key (or use password)
6. Hostname: "dhouse-waffle"
7. Click "Create Droplet"
8. Wait 60 seconds
9. Get IP address
```

#### **3. Connect & Deploy (30 minutes)**
```bash
# SSH to server
ssh root@your-ip

# Update system
apt update && apt upgrade -y

# Install Docker Compose (if not included)
apt install docker-compose -y

# Clone your repo
git clone https://github.com/your-repo/dhouse-waffle.git
cd dhouse-waffle

# Setup .env for production
cp .env.example .env
nano .env
# Edit with production values

# Start containers
docker-compose up -d

# Run migrations
docker-compose exec app php artisan migrate --force
docker-compose exec app php artisan db:seed --force

# Optimize
docker-compose exec app php artisan config:cache
docker-compose exec app php artisan route:cache
docker-compose exec app php artisan view:cache
```

#### **4. Setup Domain & SSL (30 minutes)**
```bash
# Install Nginx
apt install nginx -y

# Configure Nginx (see PRODUCTION_DEPLOYMENT_GUIDE.md)
nano /etc/nginx/sites-available/dhouse-waffle

# Install Certbot (SSL)
apt install certbot python3-certbot-nginx -y

# Get SSL certificate
certbot --nginx -d your-domain.com

# Auto-renew SSL
certbot renew --dry-run
```

#### **5. Setup Reverb (15 minutes)**
```bash
# Install Supervisor
apt install supervisor -y

# Create Reverb config
nano /etc/supervisor/conf.d/reverb.conf

# Start Reverb
supervisorctl reread
supervisorctl update
supervisorctl start reverb
```

**Total Setup Time:** ~2 hours

---

## 💰 Cost Breakdown

### **Year 1 Costs:**

#### **DigitalOcean (Recommended):**
```
VPS: $12 × 12 months = RM 684
Domain: .com = RM 50
SSL: Free
Backup: $8 × 12 = RM 458 (optional)

Total: RM 734/year (without backup)
       RM 1,192/year (with backup)

Monthly: ~RM 61 or ~RM 99
```

#### **Laravel Forge:**
```
Forge: RM 75 × 12 = RM 900
VPS: RM 57 × 12 = RM 684
Domain: RM 50
SSL: Free (auto)

Total: RM 1,634/year
Monthly: ~RM 136
```

#### **Exabytes:**
```
VPS-2: RM 50 × 12 = RM 600
Domain: Included
SSL: Free

Total: RM 600/year
Monthly: RM 50
```

---

## 📊 Traffic Capacity

### **For $12/month DigitalOcean:**
```
Concurrent Users: 50-100
Daily Orders: 200-300
Monthly Orders: 6,000-9,000
Storage: 50 GB (plenty for images)

Good for: Small to medium business
```

### **When to Upgrade:**
```
If you reach:
- 100+ concurrent users
- 500+ daily orders
- 80% memory usage
- 70% disk usage

Upgrade to: $24/month plan (2x resources)
```

---

## 🎯 Final Recommendation

### **Best Choice: DigitalOcean**

**Plan:** $12/month Droplet (RM 57)
**Location:** Singapore
**Setup:** Manual (2-3 hours)
**Total Cost:** ~RM 61/month

**Reasons:**
1. ✅ Docker pre-installed
2. ✅ Fast for Malaysia (Singapore DC)
3. ✅ Easy to scale
4. ✅ Great documentation
5. ✅ Free $200 credit (try free for 3+ months!)
6. ✅ Best value

### **If Want Zero Hassle:**

**Plan:** Laravel Forge + DigitalOcean
**Cost:** RM 136/month
**Setup:** 30 minutes
**Features:** Auto-deploy, SSL, monitoring

---

## 🚀 Quick Start Guide

### **Option 1: DigitalOcean (Budget)**
```bash
# 1. Sign up & get $200 credit
https://m.do.co/c/your-referral

# 2. Create Docker droplet
Region: Singapore
Size: $12/month
Image: Docker on Ubuntu 22.04

# 3. Deploy
Follow: PRODUCTION_DEPLOYMENT_GUIDE.md

# 4. Go live!
Time: 2-3 hours
Cost: RM 57/month (FREE first 3 months with credit)
```

### **Option 2: Laravel Forge (Easy)**
```bash
# 1. Sign up Forge
https://forge.laravel.com

# 2. Connect DigitalOcean
Add API token

# 3. Create server
Click "Create Server"

# 4. Deploy site
Connect GitHub repo
Click "Deploy"

# 5. Done!
Time: 30 minutes
Cost: RM 136/month
```

---

## ❓ FAQ

### **Q: Which is best for beginner?**
**A:** Laravel Forge (easiest) or DigitalOcean with good tutorial (budget)

### **Q: Which is cheapest?**
**A:** Exabytes (RM 50/month) but need manual setup

### **Q: Which is fastest for Malaysia?**
**A:** Vultr Kuala Lumpur or DigitalOcean Singapore

### **Q: Can I use shared hosting?**
**A:** Not recommended for Docker. VPS better.

### **Q: Need managed database?**
**A:** Optional. Can use DigitalOcean Managed MySQL (RM 60/month extra)

### **Q: How to backup?**
**A:** DigitalOcean automated backups (RM 38/month) or manual scripts

---

## 📞 Support

### **DigitalOcean:**
- Documentation: Excellent
- Community: Large
- Support: Ticket system

### **Laravel Forge:**
- Documentation: Great
- Support: Email (fast)
- Community: Laravel forums

### **Exabytes:**
- Support: Phone/Chat (Malay/English)
- Hours: Business hours
- Response: Same day

---

## ✅ Summary

| Factor | DigitalOcean | Laravel Forge | Exabytes |
|--------|--------------|---------------|----------|
| **Cost** | RM 57/mo | RM 136/mo | RM 50/mo |
| **Setup** | 2-3 hours | 30 min | 2-3 hours |
| **Docker** | Pre-installed | Auto | Manual |
| **Location** | Singapore | Any | Malaysia |
| **Support** | Docs/Ticket | Email | Phone/Chat |
| **Best For** | Tech-savvy | No hassle | Local preference |

---

**My Pick:** 🏆 **DigitalOcean $12/month**

**Why:**
- Docker ready
- Great value
- Singapore = fast for Malaysia
- Easy to scale
- Free $200 credit = try 3+ months FREE!

---

**Next Step:** Sign up DigitalOcean and get FREE $200 credit! 🎉

**Link:** https://www.digitalocean.com/

Selepas sign up, follow `PRODUCTION_DEPLOYMENT_GUIDE.md` untuk deploy! 🚀

---

## 🆓 FREE HOSTING OPTIONS

### **Option 1: Oracle Cloud (Always Free)** ⭐ **BEST FREE OPTION**

**💰 Cost:** **FOREVER FREE** (bukan trial!)

#### **Specifications:**
```
Compute:
- 2x VM instances
- ARM processor (fast!)
- Total: 4 cores + 24GB RAM (can allocate as needed)
- OR 1 OCPU + 6GB RAM per VM

Storage:
- 200 GB block storage
- 10 GB object storage

Network:
- 10 TB outbound/month
- Public IP included
```

#### **For D'house Waffle:**
```
Recommended allocation:
- 1 VM: 4 cores + 6GB RAM
- Ubuntu 22.04 ARM
- 50 GB storage
- Perfect for full system!
```

#### **Pros:**
✅ **FOREVER FREE** (no time limit!)
✅ 6GB RAM (enough for everything)
✅ Can run Docker + MySQL + Reverb
✅ 200GB storage (plenty!)
✅ 10TB bandwidth
✅ All features will work
✅ No credit card needed initially

#### **Cons:**
⚠️ Setup more complex (3-4 hours)
⚠️ ARM architecture (most images work fine)
⚠️ Account approval 24-48 hours
⚠️ No Singapore datacenter (Mumbai/Japan closest)
⚠️ ~200ms latency from Malaysia
⚠️ Oracle interface confusing

#### **Can D'house Waffle Run?**
```
✅ Laravel app
✅ MySQL database  
✅ Laravel Reverb (real-time)
✅ File uploads
✅ All 3 payment methods
✅ Sales reports
✅ 50-100 concurrent users

Performance: Good (ARM is fast!)
Latency: 150-250ms (acceptable)
```

#### **Setup Steps:**
```bash
# 1. Sign up
https://www.oracle.com/cloud/free/

# 2. Wait for approval (24-48 hours)

# 3. Create Compute Instance
- Go to Compute → Instances
- Create Instance
- Image: Ubuntu 22.04 (aarch64)
- Shape: VM.Standard.A1.Flex
- OCPU: 2, RAM: 12GB (or 1 OCPU, 6GB RAM)
- Network: Create new VCN
- Add SSH key
- Create!

# 4. Connect & Install Docker
ssh ubuntu@instance-ip

sudo apt update && sudo apt upgrade -y
sudo apt install docker.io docker-compose git -y
sudo systemctl enable docker
sudo systemctl start docker
sudo usermod -aG docker ubuntu

# 5. Deploy D'house Waffle
git clone your-repo
cd dhouse-waffle
# Follow PRODUCTION_DEPLOYMENT_GUIDE.md
docker-compose up -d

# 6. Configure firewall
# Open ports 80, 443, 8080 in Oracle Security List
```

#### **Perfect For:**
- ✅ Testing/staging environment
- ✅ Learning deployment
- ✅ Small community (< 100 users)
- ✅ Forever free hosting
- ✅ No budget constraints

**Link:** https://www.oracle.com/cloud/free/

---

### **Option 2: DigitalOcean $200 Credit** ⭐ **EASIEST FREE**

**💰 Cost:** **FREE for 3+ months**

#### **What You Get:**
```
$200 credit (valid 60 days)
= 3+ months of $12 droplet FREE!

After credit:
$12/month = RM 57/month
```

#### **Specs:**
```
$12/month Droplet:
- 2 GB RAM
- 1 vCPU
- 50 GB SSD
- 2 TB transfer
- Singapore datacenter
- Docker pre-installed
```

#### **Pros:**
✅ 3 months completely FREE
✅ Easy setup (2 hours)
✅ Docker pre-installed
✅ Singapore (20-50ms latency!)
✅ Great documentation
✅ Perfect for production
✅ Easy to scale

#### **Cons:**
⚠️ Only 2 months free credit usage
⚠️ Then $12/month (RM 57)
⚠️ Need credit card

#### **Perfect For:**
- ✅ Production testing
- ✅ Real customer traffic
- ✅ Validate business model
- ✅ Fast performance needed
- ✅ Easy setup preferred

**Link:** https://www.digitalocean.com/

---

### **Option 3: AWS Free Tier** 💰 **12 MONTHS**

**💰 Cost:** FREE for 12 months

#### **Specs:**
```
EC2 t2.micro:
- 1 GB RAM (limited!)
- 1 vCPU
- 30 GB storage
- 15 GB outbound/month

RDS (optional):
- 20 GB database
- db.t2.micro
```

#### **Pros:**
✅ 12 months free
✅ Singapore datacenter
✅ Professional infrastructure
✅ Can run Docker
✅ Scalable

#### **Cons:**
⚠️ Only 1GB RAM (tight for full system)
⚠️ Only 12 months
⚠️ Complex setup
⚠️ Easy to exceed free tier (charges!)
⚠️ Confusing billing

#### **Verdict:** ⚠️ Possible but limited resources

**Link:** https://aws.amazon.com/free/

---

### **Options NOT Recommended:**

#### **❌ Fly.io Free Tier**
- Only 256MB RAM (too small)
- No WebSocket support (Reverb won't work)
- ❌ Can't run D'house Waffle properly

#### **❌ Railway Free Tier**
- Only $5 credit/month (not enough)
- Will need upgrade quickly
- ❌ Not truly free

#### **❌ Google Cloud Free Tier**
- e2-micro: 0.25 vCPU (too slow)
- US regions only (300ms+ latency)
- ❌ Poor performance for Malaysia

#### **❌ Heroku**
- No longer has free tier
- ❌ Must pay

---

## 🏆 FREE OPTIONS COMPARISON

| Provider | Cost | RAM | Storage | Latency | Duration | Docker | Reverb | Setup |
|----------|------|-----|---------|---------|----------|--------|--------|-------|
| **Oracle Cloud** | FREE | 6GB | 200GB | ~200ms | FOREVER | ✅ | ✅ | 3-4h |
| **DigitalOcean** | FREE | 2GB | 50GB | ~30ms | 3 months | ✅ | ✅ | 2h |
| **AWS Free** | FREE | 1GB | 30GB | ~30ms | 12 months | ✅ | ⚠️ | 4h |

---

## 🎯 MY FREE RECOMMENDATIONS

### **Best FREE Strategy for D'house Waffle:**

#### **Phase 1: Oracle Cloud (Testing)** - FREE Forever
```
Duration: 1-3 months
Purpose: 
- Test full system
- Train owner/staff
- Fix any issues
- Get initial customers
- Validate concept

Cost: RM 0
Performance: Good (ARM fast)
Risk: Zero (it's free!)
```

#### **Phase 2: DigitalOcean Credit (Production)** - 3 Months FREE
```
Duration: 3 months
Purpose:
- Real production environment
- Better performance (Singapore)
- Scale to more users
- Professional hosting

Cost: RM 0 (using $200 credit)
Performance: Excellent
Risk: Zero (free period)
```

#### **Phase 3: Evaluate & Decide**
```
After 4-6 months total FREE usage:

Option A: Business Good
→ Continue DigitalOcean at RM 57/month
→ Revenue covers hosting
→ Professional hosting

Option B: Need More Time
→ Back to Oracle Cloud (free)
→ No rush to spend money

Option C: Business Not Viable
→ Stop, no money lost
→ Learned valuable lessons
```

---

## 💡 RECOMMENDED FREE PATH

### **Start HERE:**

#### **For Maximum Free Time (4-6 months):**
```bash
# Month 1-3: Oracle Cloud (FREE)
1. Sign up Oracle Cloud
2. Create Always Free VM (6GB RAM)
3. Deploy D'house Waffle
4. Test with real users
5. Train staff
6. Fix any issues

# Month 4-6: DigitalOcean (FREE $200 credit)
1. Sign up DigitalOcean
2. Get $200 credit
3. Create $12 droplet (Singapore)
4. Migrate from Oracle
5. Better performance
6. More serious customers

# After 6 months:
- Evaluate business success
- If good: Continue at RM 57/month
- If need more time: Back to Oracle (free)
- Total FREE period: 4-6 months! 🎉
```

#### **For Quick & Easy (3 months):**
```bash
# Just use DigitalOcean $200 credit
1. Sign up DigitalOcean
2. Create Docker droplet
3. Deploy immediately
4. Test for 3 months FREE
5. Then decide: Continue or stop

Simpler, faster, excellent performance!
```

---

## 📊 FREE vs PAID DECISION

### **When to Use FREE (Oracle):**
```
✅ Testing/development
✅ Learning deployment
✅ No budget
✅ Small traffic (< 50 users)
✅ Can accept 200ms latency
✅ Time to setup (3-4 hours)
```

### **When to Upgrade to PAID (DigitalOcean):**
```
✅ Production ready
✅ More than 100 users
✅ Need < 50ms latency
✅ Professional image
✅ Business generating revenue
✅ RM 57/month affordable
```

---

## 🎁 TOTAL FREE HOSTING PERIOD

### **Maximum Free Strategy:**
```
Oracle Cloud: 1-3 months testing (FREE Forever)
    +
DigitalOcean $200: 3 months production (FREE trial)
    =
4-6 MONTHS COMPLETELY FREE! 🎉

Zero cost to:
- Deploy system
- Test with real users
- Validate business
- Generate revenue
- Prove concept

Then only pay IF business is successful!
```

### **Quick Start Strategy:**
```
DigitalOcean $200 only: 3 months FREE

Fast track to production
Test properly
Then decide to continue or not

No risk, no cost for 3 months!
```

---

## ✅ FREE HOSTING SUMMARY

### **🏆 Best Overall FREE: Oracle Cloud**
```
✅ Forever free (no time limit)
✅ 6GB RAM (plenty for D'house Waffle)
✅ 200GB storage
✅ Full features work
✅ Perfect for testing
⚠️ Setup takes 3-4 hours
⚠️ Slower from Malaysia (200ms)

Verdict: BEST for testing & learning
```

### **⭐ Easiest FREE: DigitalOcean $200**
```
✅ 3 months free
✅ Docker pre-installed
✅ Singapore datacenter (fast!)
✅ Easy setup (2 hours)
✅ Perfect performance
⚠️ Only 3 months free

Verdict: BEST for production testing
```

---

## 🎯 FINAL RECOMMENDATION

**For D'house Waffle:**

### **START HERE:** 🆓

**1. Oracle Cloud (FREE Forever)**
- Sign up today
- Deploy in 3-4 hours
- Test everything
- Zero cost
- No time limit

**2. When Ready (DigitalOcean $200)**
- Migrate after testing
- 3 more months FREE
- Better performance
- Then RM 57/month

**Total: 4-6 MONTHS FREE HOSTING!** 🎉

---

**Next Steps:**
1. ✅ Sign up Oracle Cloud: https://www.oracle.com/cloud/free/
2. ✅ Follow setup guide above
3. ✅ Deploy D'house Waffle
4. ✅ Test with real users
5. ✅ Pay NOTHING! 💰

**Selepas test puas hati, baru upgrade ke DigitalOcean untuk production!** 🚀✨

