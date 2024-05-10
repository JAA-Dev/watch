<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="/">
    <html>
      <head>
        <link rel="stylesheet" type="text/css" href="styles.css"/>
      </head>
      <body>
      <div class="product-section">
        <h2>Browse Collection</h2>
        <div class="collection-container">
          <xsl:for-each select="watches/watch">
            <div class="product-container">
              <xsl:variable name="image" select="image"/>
              <img src="{$image}" alt="Watch Image"/> <br/>
              <xsl:value-of select="brand"/><br/>
              <xsl:value-of select="model"/><br/>
              Price:<xsl:value-of select="price"/><br/>
            </div>
          </xsl:for-each>

          
        </div>
        <div class="product-btn"> 
            <a class="hero-modal-btn-2" href="collection.html">View All Watch</a>
        </div>
      </div>
        
      </body>
    </html>
  </xsl:template>
</xsl:stylesheet>
