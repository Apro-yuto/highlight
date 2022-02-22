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
import ITEM_STATUSES from '@/js/Constants/Item/Status'
import getToJpyString from '@/js/Partials/getToJpyString'
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
                  color: ITEM_STATUSES[props.item.status].is_error
                    ? 'error.mail'
                    : 'info.mail',
                  fontSize: { lg: 16, xs: 14 },
                  fontWeight: 600,
                }}
              >
                {ITEM_STATUSES[props.item.status].status_name}
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
                  mt: 2,
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
                        ...textOverflowStyles,
                        fontSize: 20,
                        display: 'block',
                        lineHeight: 1,
                      }}
                    >
                      {getToJpyString(props.item.purchasePrice)}
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
                        ...textOverflowStyles,
                        fontSize: 20,
                        display: 'block',
                        lineHeight: 1,
                      }}
                    >
                      {getToJpyString(props.item.sellingPrice)}
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
