import React from 'react'
import {
  CardActionArea,
  Grid,
  Card,
  CardContent,
  Typography,
  Box,
  Divider,
  Chip,
} from '@mui/material'
import ItemCardGender from '@/js/components/ItemCardGender'
import ItemCardImage from '@/js/components/ItemCardImage'
import ItemProps from '@/js/Types/Item/ItemProps'
import textOverflowStyles from '@/js/Styles/textOverflowStyles'

interface Props {
  item: ItemProps
}

const ItemCard: React.VFC<Props> = (props) => {
  return (
    <Grid item lg={3} xs={6}>
      <Card sx={{ color: '#444', boxShadow: 6 }}>
        <a href="/item">
          <CardActionArea sx={{ color: '#333' }}>
            <ItemCardImage imagePath={props.item.itemImage} />
            <CardContent>
              <Typography
                mt={1}
                variant="subtitle2"
                component="h2"
                sx={{
                  ...textOverflowStyles,
                  fontSize: { lg: 16, xs: 14 },
                  fontWeight: 600,
                }}
              >
                {props.item.status}
              </Typography>

              <Divider sx={{ mt: 1 }} />

              <Typography
                mt={1}
                variant="h6"
                component="h2"
                sx={{
                  ...textOverflowStyles,
                }}
              >
                {props.item.brand}
              </Typography>

              <Chip
                sx={{
                  ...textOverflowStyles,
                  mt: 1,
                }}
                variant="outlined"
                label={
                  <Typography
                    variant="overline"
                    component="span"
                    sx={{ lineHeight: 1 }}
                  >
                    {props.item.category}
                  </Typography>
                }
              />

              <Box
                component="div"
                sx={{
                  display: 'flex',
                  flexDirection: { lg: 'row', xs: 'column' },
                }}
              >
                <Box
                  component="div"
                  sx={{
                    width: { lg: '50%', xs: '100%' },
                    mt: 1,
                  }}
                >
                  <Typography component="p" variant="subtitle2">
                    仕入値
                    <Typography
                      component="span"
                      variant="h5"
                      sx={{
                        display: 'block',
                        lineHeight: 1,
                      }}
                    >
                      &yen;{props.item.purchasePrice}
                    </Typography>
                  </Typography>
                </Box>
                <Box
                  component="div"
                  sx={{
                    width: { lg: '50%', xs: '100%' },
                    mt: 1,
                    pl: { lg: 1, xs: 0 },
                  }}
                >
                  <Typography component="p" variant="subtitle2">
                    売値
                    <Typography
                      component="span"
                      variant="h5"
                      sx={{
                        display: 'block',
                        overflow: 'hidden',
                        textOverflow: 'ellipsis',
                        whiteSpace: 'nowrap',
                        maxWidth: '100%',
                        lineHeight: 1,
                      }}
                    >
                      &yen;{props.item.sellingPrice}
                    </Typography>
                  </Typography>
                </Box>
              </Box>
            </CardContent>

            <ItemCardGender numGender={props.item.gender} />
          </CardActionArea>
        </a>
      </Card>
    </Grid>
  )
}

export default ItemCard
