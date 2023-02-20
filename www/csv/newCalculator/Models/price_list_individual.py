from sqlalchemy import Column, Integer, String, Text
from sqlalchemy.ext.declarative import declarative_base

Base = declarative_base()
class price_list_individual(Base):
	__tablename__ = 'price_list_individual'
	id = Column(Integer, primary_key=True)
	PriceModelID = Column(Text)
	LOC = Column(Text)
	Type = Column(Text)
	EntryTime = Column(Text)
	ExitTime = Column(Text)
	Payer = Column(Text)
	Receiver = Column(Text)
	TariffID = Column(Text)
